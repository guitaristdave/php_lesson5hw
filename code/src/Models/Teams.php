<?php

namespace Geekbrains\Application1\Models;

use AllowDynamicProperties;
use Geekbrains\Application1\Application;


class Teams
{
    private static string $path;

    public function __construct()
    {
        self::$path = $_SERVER['DOCUMENT_ROOT'] . Application::config()["storage"]["data"];

    }

    public static function getTeamsData(): array
    {
        $teams = new Teams();
        $teamsData = [];
        if (file_exists($teams::$path) && is_readable($teams::$path)) {
            $file = file_get_contents($teams::$path);
            $teamsData = json_decode($file , true);
        }
        return ["teams" => $teamsData["teams"]];
    }
}


