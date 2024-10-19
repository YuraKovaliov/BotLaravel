<?php


namespace App\Http\Controllers;
use App\Models\Information;
use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;
use Illuminate\Support\Stringable;



class Handler extends WebhookHandler
{



    public function start(): void
    {
        $bot = new \DefStudio\Telegraph\Telegraph;
        $userId = $this->message->from()->id();
        $firstName = $this->message->from()->firstName();
        $username = $this->message->from()->username();
        $message = $this->message->text();

        $keyboard = ReplyKeyboard::make()->buttons([
           ReplyButton::make('Начать ✅'),
           ReplyButton::make('Назад ◀️'),
           ReplyButton::make('Admin'),
       ]);
        $bot->chat($userId)
            ->message("Привет! , $firstName давай пройдём тест?")
            ->replyKeyboard($keyboard)
            ->send();

        $register_user = Information::where('userID', $userId)->first();

       if ($register_user) {
           // Запись найдена, обновляем данные
           $register_user->firstName = $firstName;
           $register_user->username = $username;
           $register_user->save();
       } else {
           // Запись не найдена, создаем новую
           $register_user = new Information();
           $register_user->userID = $userId;
           $register_user->firstName = $firstName;
           $register_user->username = $username;
           $register_user->save();
       }

    }


    protected function handleChatMessage(Stringable $text): void
    {
        $bot = new \DefStudio\Telegraph\Telegraph;
        $userId = $this->message->from()->id();
        $firstName = $this->message->from()->firstName();
        $username = $this->message->from()->username();
        $message = $this->message->text();
        $usermenu = Information::where('userID', $userId)->first(); // ищем конкретного пользователя
        $db = Information::firstOrNew(['userID' => $userId]); // ищем запись по userID

        if($text == 'Admin'){
            $keyboard = ReplyKeyboard::make()->buttons([
                ReplyButton::make('Начать ✅'),
                ReplyButton::make('Назад ◀️'),
                ReplyButton::make('Admin'),
                ]);
            $bot->chat($userId)
                ->message("Админ панель")
                ->keyboard(Keyboard::make()->buttons([
                    Button::make('open')->url('https://fad9-85-238-105-213.ngrok-free.app/'),
                ]))
                ->send();

        }


        if ($text == 'Назад ◀'){
            $db->Menu = 0;
            $db->save();
            $keyboard = ReplyKeyboard::make()->buttons([
                ReplyButton::make('Начать ✅'),
                ReplyButton::make('Назад ◀️'),
                ReplyButton::make('Admin'),
                ]);
            $bot->chat($userId)
                ->message("главное меню")
                ->replyKeyboard($keyboard)
                ->send();
        }

        if ($text == 'Начать ✅') {
            //$v = MessageController::Begin();
            $bot = new \DefStudio\Telegraph\Telegraph;
            $keyboard = ReplyKeyboard::make()->buttons([
                ReplyButton::make('363 ✅'),
                ReplyButton::make('23 ✅'),
                ReplyButton::make('153 ✅'),
                ReplyButton::make('Назад ◀'),
            ]);

            $bot->chat($userId)
                ->message("Сколько будет\n\n10 + 353")
                ->replyKeyboard($keyboard)
                ->send();

            $db = Information::firstOrNew(['userID' => $userId]); // ищем запись по userID
            $db->Menu = 1; // устанавливаем значение поля Menu
            $db->save(); // сохраняем (или обновляем, если запись уже существует)
        }


        if ($usermenu && $usermenu->Menu == 1) {
            $validAnswers = ['363 ✅', '23 ✅', '153 ✅'];

            if (!empty($message)) {
                // Проверяем, является ли ответ допустимым
                if (in_array($message, $validAnswers)) {
                    // Создаем клавиатуру
                    $keyboard = ReplyKeyboard::make()->buttons([
                        ReplyButton::make('45 ✅'),
                        ReplyButton::make('100 ✅'),
                        ReplyButton::make('82 ✅'),
                        ReplyButton::make('Назад ◀'),
                    ]);

                    // Отправляем сообщение
                    $bot->chat($userId)
                        ->message("Сколько будет\n\n65 + 35")
                        ->replyKeyboard($keyboard)
                        ->send();

                    // Сохраняем данные в базе
                    $db->Menu = 2; // устанавливаем значение поля Menu
                    $db->answer1 = $message;
                    $db->save(); // сохраняем (или обновляем, если запись уже существует)

                }
            }
        }
        if($usermenu && $usermenu->Menu == 2){
            $validAnswers = ['45 ✅', '100 ✅', '82 ✅'];

            if (!empty($message)) {
                // Проверяем, является ли ответ допустимым
                if (in_array($message, $validAnswers)) {
                    // Создаем клавиатуру
                    $keyboard = ReplyKeyboard::make()->buttons([
                        ReplyButton::make('43 ✅'),
                        ReplyButton::make('67 ✅'),
                        ReplyButton::make('18 ✅'),
                        ReplyButton::make('Назад ◀'),
                    ]);

                    // Отправляем сообщение
                    $bot->chat($userId)
                        ->message("Сколько будет\n\n68 - 50")
                        ->replyKeyboard($keyboard)
                        ->send();

                    // Сохраняем данные в базе
                    $db->Menu = 3; // устанавливаем значение поля Menu
                    $db->answer2 = $message;
                    $db->save(); // сохраняем (или обновляем, если запись уже существует)

                }
            }
        }
        if($usermenu && $usermenu->Menu == 3){
            $validAnswers = ['43 ✅', '67 ✅', '18 ✅'];
            if (!empty($message)){
                if (in_array($message, $validAnswers)) {
                    $keyboard = ReplyKeyboard::make()->buttons([
                        ReplyButton::make('32 ✅'),
                        ReplyButton::make('67 ✅'),
                        ReplyButton::make('80 ✅'),
                        ReplyButton::make('Назад ◀'),
                    ]);

                    $bot->chat($userId)
                        ->message("Сколько будет\n\n68 - 50")
                        ->replyKeyboard($keyboard)
                        ->send();
                    $db->Menu = 4; // устанавливаем значение поля Menu
                    $db->answer3 = $message;
                    $db->save(); // сохраняем (или обновляем, если запись уже существует)
                }
        }

        }

        if($usermenu && $usermenu->Menu == 4){
            $validAnswers = ['32 ✅', '67 ✅', '80 ✅'];
            if (!empty($message)){
                if (in_array($message, $validAnswers)) {
                    $keyboard = ReplyKeyboard::make()->buttons([
                        ReplyButton::make('56 ✅'),
                        ReplyButton::make('89 ✅'),
                        ReplyButton::make('31 ✅'),
                        ReplyButton::make('Назад ◀'),
                    ]);

                    $bot->chat($userId)
                        ->message("Сколько будет\n\n68 - 50")
                        ->replyKeyboard($keyboard)
                        ->send();
                    $db->Menu = 'close'; // устанавливаем значение поля Menu
                    $db->answer4 = $message;
                    $db->save(); // сохраняем (или обновляем, если запись уже существует)
                }

            }
        }
        if($usermenu && $usermenu->Menu == 'close'){
            $validAnswers = ['56 ✅', '89 ✅', '31 ✅'];
            if (!empty($message)){
                if (in_array($message, $validAnswers)) {
                    $keyboard = ReplyKeyboard::make()->buttons([
                        ReplyButton::make('Начать ✅'),
                        ReplyButton::make('Назад ◀️'),
                        ReplyButton::make('Admin'),
                    ]);
                    $bot->chat($userId)
                        ->message("Спасибо за тест ,мы скоро свяжемся с вами!")
                        ->send();

                    $db->Menu = '0';
                    $db->save();
                    $answer = Information::where('userID', $userId)->first();


                    $messageText  = "Тест сделал\nИмя:$firstName\nId:$userId\nОтветы:$answer->answer1,$answer->answer2,$answer->answer3,$answer->answer4";
                    $idAdmin = 433335467;

                    $bot->chat($idAdmin)
                        ->message($messageText)
                        ->send();

                    sleep(1);
                    $bot->chat($userId)
                        ->message("гланвое меню:")
                        ->replyKeyboard($keyboard)
                        ->send();

                }

                }
        }

    }

}
