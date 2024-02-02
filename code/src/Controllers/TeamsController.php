<?php

namespace Geekbrains\Application1\Controllers;

use Geekbrains\Application1\Models\Teams;
use Geekbrains\Application1\Render;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class TeamsController
{
    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function actionIndex(): string
    {
        $teams = new Teams();
        $teamsData = $teams::getTeamsData();
        $render = new Render();
        return $render->renderPage('team-list.twig', $teamsData);
    }
}