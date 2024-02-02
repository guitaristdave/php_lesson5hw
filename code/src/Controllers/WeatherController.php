<?php

namespace Geekbrains\Application1\Controllers;

use Geekbrains\Application1\Models\Weather;
use Geekbrains\Application1\Render;

class WeatherController
{
    protected Weather $weather;

    public function __construct()
    {
        $this->weather = new Weather();
    }

    public function actionIndex(): string
    {
        $city = 'Москва';
        $weatherData = $this->weather->getWeather($city);
        $render = new Render();
        return$render->renderPage('weather.twig', [
            'title' => "$city: погода",
            'name' => $weatherData["name"],
            'descr' => $weatherData["weather"][0]["description"],
            'temp' => $weatherData["main"]["temp"],
            'feels' => $weatherData["main"]["feels_like"]
        ]);
    }
}


