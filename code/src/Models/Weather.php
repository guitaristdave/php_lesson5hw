<?php

namespace Geekbrains\Application1\Models;

class Weather
{
    protected string $url = "https://api.openweathermap.org/data/2.5/weather";
    protected string $appid = '3e40ed1f253b4799283fa2fa4dbe9688';
    protected string $lang = 'ru';
    protected string $units = 'metric';


    public function getWeather(string $city): array
    {
        $options = array(
            'q' => $city,
            'appid' => $this->appid,
            'lang' => $this->lang,
            'units' => $this->units
        );

        $ch = curl_init();
        curl_setopt($ch , CURLOPT_RETURNTRANSFER , true);
        curl_setopt($ch , CURLOPT_URL , $this->url . '?' . http_build_query($options));
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }
}

