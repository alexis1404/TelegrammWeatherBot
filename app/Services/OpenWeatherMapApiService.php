<?php

namespace App\Services;

use GuzzleHttp;

class OpenWeatherMapApiService
{
    public function getWeatherFofCity($city_name)
    {
        $weather_content_message = null;

        $url = 'http://api.openweathermap.org/data/2.5/weather?q='
            . $city_name .',ru&appid=' . env('WEATHER_TOKEN') .'&units=metric';

        $client = new GuzzleHttp\Client();

        try {

            $res = $client->request('GET', $url);

        }catch (GuzzleHttp\Exception\ClientException $e){
            $weather_content_message = false;
            return $weather_content_message;
        }

        $weather_content = json_decode($res->getBody()->getContents(), true);

        $weather_content_message = 'Температура: ' .$weather_content['main']['temp'] . ' C'  . PHP_EOL .
             'Скорость ветра: ' . $weather_content['wind']['speed'] . 'м/с  ' . PHP_EOL .
             'Облачность: ' .$weather_content['weather'][0]['description'];

        return $weather_content_message;

    }
}