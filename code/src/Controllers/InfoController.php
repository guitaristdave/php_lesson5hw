<?php

namespace Geekbrains\Application1\Controllers;

use Geekbrains\Application1\Models\SiteInfo;
use Geekbrains\Application1\Render;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class InfoController
{

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function actionIndex(): string
    {
        $siteInfo = new SiteInfo();
        $render = new Render();
        return $render->renderPage('site-info.twig', [
            "title" => 'Info',
            "server" => $siteInfo->getWebServer(),
            "phpVersion" => $siteInfo->getPhpVersion(),
            "userAgent" => $siteInfo->getUserAgent()
        ]);
    }
}