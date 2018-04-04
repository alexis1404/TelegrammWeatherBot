<?php

namespace App\Services;

use Telegram\Bot\Api;

class TelegramBotService
{
    private $weather_service;

    public function __construct(OpenWeatherMapApiService $w_service)
    {
        $this->weather_service = $w_service;
    }

    public function botWeatherInSitySpeak()
    {

        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));

        $user_full_message_content = $telegram->getWebhookUpdates();

        $text = (string)$user_full_message_content["message"]["text"];
        $chat_id = $user_full_message_content["message"]["chat"]["id"];

        if($text){

            if ($text == "/start") {

                $telegram->sendMessage([
                    'chat_id' => $chat_id,
                    'text' => 'Добро пожаловать! Я- погодный бот. Введите название города и я скажу, какая там сейчас погода! (Пока я работаю только с городами России, но скоро это может измениться! ;)'
                ]);
                return;
            }

            $trim_message = trim($text);

            $weather_result = $this->weather_service->getWeatherFofCity($trim_message);

            if($weather_result){

                $telegram->sendMessage([

                    'chat_id' => $chat_id,
                    'text' => $weather_result
                ]);

            }else{
                $telegram->sendMessage([
                    'chat_id' => $chat_id,
                    'text' => "Хм... Вы ввели что-то не то (а, возможно, я просто не знаю такого города). Повторите, пожалуйста!"
                ]);
            }

        }else{

            $telegram->sendMessage([
                'chat_id' => $chat_id,
                'text' => "Отправьте текстовое сообщение (оно не может быть пустым!)"
            ]);
        }
    }
}