<?php

namespace App\Http\Controllers;

use App\Services\TelegramBotService;

class BotController extends Controller
{
    private $t_service;

    public function __construct(TelegramBotService $map_service)
    {
        $this->t_service = $map_service;
    }

    public function index()
    {
        $this->t_service->botWeatherInSitySpeak();
    }
}
