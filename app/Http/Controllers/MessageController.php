<?php

namespace App\Http\Controllers;

use App\Models\Information;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    static function Begin(){
        $bot = new \DefStudio\Telegraph\Telegraph;
        $keyboard = ReplyKeyboard::make()->buttons([
            ReplyButton::make('363 ✅'),
            ReplyButton::make('23 ✅'),
            ReplyButton::make('153 ✅'),
            ReplyButton::make('Назад ◀'),
        ]);

        $bot->message("Сколько будет\n\n10 + 353")
            ->replyKeyboard($keyboard)
            ->send();

    }
}
