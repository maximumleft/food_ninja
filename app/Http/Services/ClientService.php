<?php

namespace App\Http\Services;

use App\Models\Clients;
use App\Models\User;

class ClientService
{
    public function replacePhone(array $clientData): array|string|null
    {
        if (str_starts_with($clientData['phone'], '+7')||str_starts_with($clientData['phone'], '8')) {
            $clientData['phone'] = '7' . substr($clientData['phone'], 2);
        }
        return preg_replace('/\D/', '', $clientData['phone']);
    }

    public function findOrCreateUser(Clients $client)
    {
        $user = User::where('phone', $client->phone)->first();

        if (!$user) {
            $user = new User();
            $user->name = $client->name;
            $user->email = $client->email;
            $user->phone = $client->phone;
            $user->save();
        }
        return $user;
    }
}
