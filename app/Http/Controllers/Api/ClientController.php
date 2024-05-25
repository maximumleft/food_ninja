<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientsStoreRequest;
use App\Http\Requests\ClientsUpdateRequest;
use App\Http\Resources\ClientResource;
use App\Http\Services\ClientService;
use App\Models\Clients;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public ClientService $service;

    public function __construct()
    {
        $this->service = new ClientService();
    }

    public function index(): JsonResponse
    {
        $clients = Clients::all();
        return response()->json([
            'status' => 'ok',
            'data' => [
                'clients' => ClientResource::collection($clients),
            ]
        ]);
    }

    public function show(Clients $client): JsonResponse
    {
        return response()->json([
            'status' => 'ok',
            'data' => [
                'client' => ClientResource::make($client),
            ]
        ]);
    }

    public function store(ClientsStoreRequest $request): JsonResponse
    {
        $clientData = $request->validated();
        $client = Clients::createOrFirst([
            'phone' => $clientData['phone'],
        ], $clientData);

        return response()->json([
            'status' => 'ok',
            'data' => [
                'client' => ClientResource::make($client),
            ]
        ]);
    }

    public function update(Clients $client, ClientsUpdateRequest $request): JsonResponse
    {
        $clientData = $request->validated();
        $client->update($clientData);

        return response()->json([
            'status' => 'ok',
            'data' => [
                'client' => ClientResource::make($client),
            ]
        ]);
    }

    public function delete(Clients $client): JsonResponse
    {
        $client->trashed();

        return response()->json([
                'status' => 'ok',
                'data' =>
                    ['message' => 'Пользователь удален']]
        );
    }

    public function authenticate(ClientsStoreRequest $request): JsonResponse
    {
        $clientData = $request->validated();
        $phone = $this->service->replacePhone($clientData);
        $client = Clients::query()->where('phone', $phone)->first();
        if (!$client) {
            $client = Clients::create(['phone' => $phone]);
        }
        Auth::login($this->service->findOrCreateUser($client));

        return response()->json([
            'status' => 'ok',
            'data' => [
                'client' => ClientResource::make($client),
            ]
        ]);
    }
}
