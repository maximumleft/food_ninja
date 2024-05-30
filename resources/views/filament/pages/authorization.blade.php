<x-filament-panels::page>
    {{--    <x-filament-panels::form>--}}
    {{--        {{$this->radioForm}}--}}
    {{--    </x-filament-panels::form>--}}
    {{--    {{$user}}--}}
    <link rel="stylesheet" href="{{asset('css/filament/filament/authorization.css')}}">
    <form action="/submit" method="post">
        <div>
            <div>
                <input type="radio" id="option1" name="options" value="option1">
                <label for="option1">Отключено</label>
            </div>
            <div class="mt-2">
                <span>Не использовать авторизацию по номеру телефона.</span>
            </div>
        </div>
        <div>
            <div class="mt-5">
                <input type="radio" id="option2" name="options" value="option2">
                <label for="option2">FlashCall</label>
            </div>
            <div class="mt-2">
                <span>Авторизация через звонок робота. Клиенту нужно ввести последние 4 цифры номера, с которого ему поступит звонок.</span>
            </div>
        </div>
        <div>
            <div class="mt-5">
                <input type="radio" id="option3" name="options" value="option3">
                <label for="option3">SMS</label>
            </div>
            <div class="mt-2">
                <span>Авторизация через SMS. Клиенту нужно ввести код из 4 цифр, который он получит в SMS.</span>
            </div>
        </div>
        <div>
            <div class="mt-5">
                <input type="radio" id="option4" name="options" value="option4">
                <label for="option4">FlashCall + SMS</label>
            </div>
            <div class="mt-2">
                <span>Комбинированный вариант. Авторизация через звонок робота. Если клиенту не приходит звонок, то он может запросить код для авторизации через смс.</span>
            </div>
        </div>
        <div id="textBlock" style="display: none;">
            <div class="mt-5">
                <span>Текст, который будет показан при выборе 'Отключено'.</span>
            </div>
        </div>
        <x-filament-tables::container style="display: none;padding: 10px 25px;margin-top: 20px;margin-bot: 20px;"
                                      id="Block">
            <span class="font-medium">Для включения авторизации по СМС и/или FlashCall подключите шлюзы, которые осуществляют звонки Flashcall и отправку СМС.Для включения авторизации по СМС и/или FlashCall подключите шлюзы, которые осуществляют звонки Flashcall и отправку СМС.</span>
            <div style="display: flex; justify-content:left;">
                <div>
                    <div style="margin-top: 20px;">
                        <input type="radio" id="option5" name="options2" value="option5">
                        <label for="option5">Foodninja (SMS Агент)</label>
                    </div>
                </div>
                <div>
                    <div style="margin-top: 20px;margin-left: 10px;">
                        <input type="radio" id="option6" name="options2" value="option6">
                        <label for="option6">Свои</label>
                    </div>
                </div>
            </div>
            <div id="miniBlock1" class="mb-5">
                <x-filament-tables::container style="padding: 10px 25px;margin-top: 20px;">
                    <div class="flex flex-row leading-6 text-sm"
                         style="gap: 15px; justify-items: center; align-items: center;">
                        <div>
                            <span class="font-medium">FlashCall</span>
                            <span class="text-gray-950 dark:text-white">
                        <p>Стоимость одного звонка 0.84 ₽</p>
                        <p>Расходы за прошлый месяц: 0.00 ₽</p>
                        <p>Расходы в текущем месяце: 0.00 ₽</p>
                    </span>
                        </div>
                    </div>
                </x-filament-tables::container>
                <x-filament-tables::container style="padding: 10px 25px;margin-top: 20px;">
                    <div class="flex flex-row leading-6 text-sm"
                         style="gap: 15px; justify-items: center; align-items: center;">
                        <div>
                            <span class="font-medium">SMS</span>
                            <span class="text-gray-950 dark:text-white">
                        <p>Стоимость одного смс от 3.42 ₽</p>
                        <p>Расходы за прошлый месяц: 0.00 ₽</p>
                        <p>Расходы в текущем месяце: 0.00 ₽</p>
                    </span>
                        </div>
                    </div>
                </x-filament-tables::container>
            </div>
            <div id="miniBlock2" style="display: none;margin-top: 30px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-top: 10px">
                    <div style="flex-basis: 45%; display: flex; flex-direction: column;">
                        <div style="margin-bottom: 20px;">
                            <div style="display: flex; flex-direction: column;">
                                <label>Шлюз Flashcall</label>
                                <select class="select1" onchange="showMiniBlock3(this.value)">
                                    <option id="selector0" value="0">Выберите</option>
                                    <option id="selector1" value="1">SMS Агент</option>
                                    <option id="selector2" value="2">SMS.RU</option>
                                    <option id="selector3" value="3">Ucaller</option>
                                </select>
                            </div>
                        </div>
                        <div style="flex-grow: 1; overflow: auto;">
                            <div id="miniBlock5" style="display:none;">
                                <div class="flex flex-row leading-6 text-sm"
                                     style="justify-items: center;margin-top: 20px">
                                    <div style="display: flex; flex-direction: column;">
                                        <label>Логин</label>
                                        <input type="text" class="login-input">
                                    </div>
                                </div>
                                <div class="flex flex-row leading-6 text-sm"
                                     style="justify-items: center; margin-top: 20px">
                                    <div style="display: flex; flex-direction: column;">
                                        <label>Пароль</label>
                                        <input type="text" class="password-input">
                                    </div>
                                </div>
                            </div>
                            <div id="miniBlock6" style="display:none;">
                                <div class="flex flex-row leading-6 text-sm"
                                     style="justify-items: center;margin-top: 20px">
                                    <div style="display: flex; flex-direction: column;">
                                        <label>APP_ID сервиса</label>
                                        <input type="text" class="app-id-input">
                                    </div>
                                </div>
                            </div>
                            <div id="miniBlock7" style="display:none;">
                                <div class="flex flex-row leading-6 text-sm"
                                     style="justify-items: center;margin-top: 20px">
                                    <div style="display: flex; flex-direction: column;">
                                        <label>ID сервиса</label>
                                        <input type="text" class="id-service-input">
                                    </div>
                                </div>
                                <div class="flex flex-row leading-6 text-sm"
                                     style="justify-items: center; margin-top: 20px">
                                    <div style="display: flex; flex-direction: column;">
                                        <label>Секретный ключ сервиса</label>
                                        <input type="text" class="secret-key-service-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="flex-basis: 45%; display: flex; flex-direction: column;">
                        <div style="margin-bottom: 20px;">
                            <div style="display: flex; flex-direction: column;">
                                <label>Шлюз СМС</label>
                                <select class="select2" onchange="showMiniBlock4(this.value)">
                                    <option value="0">Выберите</option>
                                    <option value="1">SMS Агент</option>
                                    <option value="2">SMS.RU</option>
                                </select>
                            </div>
                            <div style="flex-grow: 1; overflow: auto;">
                                <div id="miniBlock8" style="display:none;">
                                    <div class="flex flex-row leading-6 text-sm"
                                         style="justify-items: center;margin-top: 20px">
                                        <div style="display: flex; flex-direction: column;">
                                            <label>Логин</label>
                                            <input type="text" class="login-sms-input">
                                        </div>
                                    </div>
                                    <div class="flex flex-row leading-6 text-sm"
                                         style="justify-items: center; margin-top: 20px">
                                        <div style="display: flex; flex-direction: column;">
                                            <label>Пароль</label>
                                            <input type="text" class="password-sms-input">
                                        </div>
                                    </div>
                                    <div class="flex flex-row leading-6 text-sm"
                                         style="justify-items: center; margin-top: 20px">
                                        <div style="display: flex; flex-direction: column;">
                                            <label>Имя отправителя</label>
                                            <input type="text" class="name-sms-input">
                                        </div>
                                    </div>
                                    <div style="margin-top: 20px">
                                        <span>Имя отправителя обязательно и должно быть зарегистрировано в SMS Агент</span>
                                    </div>
                                </div>
                                <div id="miniBlock9" style="display:none;">
                                    <div class="flex flex-row leading-6 text-sm"
                                         style="justify-items: center;margin-top: 20px">
                                        <div style="display: flex; flex-direction: column;">
                                            <label>APP_ID сервиса</label>
                                            <input type="text" class="app-id-service-sms-input">
                                        </div>
                                    </div>
                                    <div class="flex flex-row leading-6 text-sm"
                                         style="justify-items: center; margin-top: 20px">
                                        <div style="display: flex; flex-direction: column;">
                                            <label>Имя отправителя</label>
                                            <input type="text" class="name-sms-ru-input">
                                        </div>
                                    </div>
                                    <div style="margin-top: 20px">
                                        <span>Имя отправителя обязательно и должно быть зарегистрировано в SMS.RU</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </x-filament-tables::container>
        <x-filament-tables::container style="display: none;padding: 10px 25px;margin-top: 20px;" id="Block2">
            <span class="font-medium">Для включения авторизация по СМС и/или FlashCall подключите Google reCaptcha или Yandex SmartCaptcha.</span>
            <div style="margin-top:15px">
                <div>
                    <input type="radio" id="option7" name="options3" value="option7">
                    <label for="option7">Google reCaptcha</label>
                </div>
                <div>
                    <input type="radio" id="option8" name="options3" value="option8">
                    <label for="option8">Yandex SmartCaptcha</label>
                </div>
            </div>
            <div id="miniBlock3" style="display: none;">
                <div style="margin-top:15px">
                    <span>Получить ключи можно по <a
                            href="https://www.google.com/recaptcha/admin/create">ссылке</a>.</span>
                </div>
                <div class="flex flex-row leading-6 text-sm"
                     style="gap: 68px; justify-items: center; align-items: center;margin-top: 10px">
                    <label>Ключ сайта</label>
                    <div>
                        <input type="text" class="key-site-input">
                    </div>
                </div>
                <div class="flex flex-row leading-6 text-sm"
                     style="gap: 30px; justify-items: center; align-items: center;margin-top: 10px">
                    <label>Секретный ключ</label>
                    <div>
                        <input type="text" class="secret-key-input">
                    </div>
                </div>
                <x-filament-tables::container style="padding: 10px 25px;margin-top: 30px;background-color:#FF24243F;">
                    <x-filament-forms::field-wrapper style="color: rgb(var(--primary-500));">
                        <div class="flex flex-row leading-6 text-sm"
                             style="gap: 15px; justify-items: center; align-items: center;">
                            <x-heroicon-s-exclamation-triangle style="max-width: 70px; margin-top: 10px;"/>
                            <div>
                                <span class="font-medium">Важно!<p></span>
                                <span class="text-gray-950 dark:text-white">
                                В приложении VK mini apps на некоторых моделях iPhone существует проблема инициализации Google Recaptcha, что нарушает работу авторизации по номеру телефона.
Рекомендуем отключить авторизацию по номеру телефону в VK mini apps (сделать это можно во вкладке «Соцсети») или подключить Yandex Smart Captcha.
                    </span>
                            </div>
                        </div>
                    </x-filament-forms::field-wrapper>
                </x-filament-tables::container>
            </div>
            <div id="miniBlock4" style="display: none;">
                <div style="margin-top:15px">
                    <span><a href="https://help.foodninja.pro/docs/add/yandex-smartcaptcha-settings/">Инструкция</a>
                        как создать капчу и получить ключи.</span>
                </div>
                <div class="flex flex-row leading-6 text-sm"
                     style="gap: 49px; justify-items: center; align-items: center;margin-top: 10px">
                    <label>Ключ клиента</label>
                    <div>
                        <input type="text" class="client-key-input">
                    </div>
                </div>
                <div class="flex flex-row leading-6 text-sm"
                     style="gap: 48px; justify-items: center; align-items: center;margin-top: 10px">
                    <label>Ключ сервера</label>
                    <div>
                        <input type="text" class="server-key-input">
                    </div>
                </div>
            </div>
        </x-filament-tables::container>
        <input type="submit" value="Отправить">
    </form>
    <script>
        function showBlock(choice) {
            const Block = document.getElementById("Block");
            const Block2 = document.getElementById("Block2");
            if (choice) {
                Block.style.display = "block";
                Block2.style.display = "block";
            } else {
                Block.style.display = "none";
                Block2.style.display = "none";
            }
        }

        document.getElementById("option1").addEventListener("change", function () {
            showBlock(false);
        });
        document.getElementById("option2").addEventListener("change", function () {
            showBlock(true);
        });
        document.getElementById("option3").addEventListener("change", function () {
            showBlock(true);
        });
        document.getElementById("option4").addEventListener("change", function () {
            showBlock(true);
        });

        function showMiniBlock1(choice) {
            const Block1 = document.getElementById("miniBlock1");
            const Block2 = document.getElementById("miniBlock2");
            if (choice) {
                Block1.style.display = "block";
                Block2.style.display = "none";
            } else {
                Block2.style.display = "block";
                Block1.style.display = "none";
            }
        }

        document.getElementById("option5").addEventListener("change", function () {
            showMiniBlock1(true);
        });
        document.getElementById("option6").addEventListener("change", function () {
            showMiniBlock1(false);
        });

        function showMiniBlock2(choice) {
            const Block1 = document.getElementById("miniBlock3");
            const Block2 = document.getElementById("miniBlock4");
            if (choice) {
                Block1.style.display = "block";
                Block2.style.display = "none";
            } else {
                Block1.style.display = "none";
                Block2.style.display = "block";
            }
        }

        document.getElementById("option7").addEventListener("change", function () {
            showMiniBlock2(true);
        });
        document.getElementById("option8").addEventListener("change", function () {
            showMiniBlock2(false);
        });

        function showMiniBlock3(choice) {
            const Block1 = document.getElementById("miniBlock5");
            const Block2 = document.getElementById("miniBlock6");
            const Block3 = document.getElementById("miniBlock7");
            if (choice == 1) {
                Block1.style.display = "block";
                Block2.style.display = "none";
                Block3.style.display = "none";
            } else if(choice == 2) {
                Block1.style.display = "none";
                Block2.style.display = "block";
                Block3.style.display = "none";
            } else if(choice == 3){
                Block1.style.display = "none";
                Block2.style.display = "none";
                Block3.style.display = "block";
            } else{
                Block1.style.display = "none";
                Block2.style.display = "none";
                Block3.style.display = "none";
            }
        }
        function showMiniBlock4(choice) {
            const Block1 = document.getElementById("miniBlock8");
            const Block2 = document.getElementById("miniBlock9");

            if (choice == 0) {
                Block1.style.display = "none";
                Block2.style.display = "none";
            } else if(choice == 1) {
                Block1.style.display = "block";
                Block2.style.display = "none";
            } else if(choice == 2){
                Block1.style.display = "none";
                Block2.style.display = "block";
            }
        }
    </script>
</x-filament-panels::page>
