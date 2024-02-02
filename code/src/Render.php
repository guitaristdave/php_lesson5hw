<?php

namespace Geekbrains\Application1;

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class Render {

    private string $viewFolder = '/src/Views/';
    private FilesystemLoader $loader;
    private Environment $environment;


    public function __construct(){

        $this->loader = new FilesystemLoader(dirname(__DIR__) . $this->viewFolder);
        $this->environment = new Environment($this->loader, [
            'cache' => $_SERVER['DOCUMENT_ROOT'].'/cache/',
        ]);
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function renderPage(string $contentTemplateName = 'page-index.twig', array $templateVariables = []): string
    {
        $template = $this->environment->load('main.twig');
        
        $templateVariables['content_template_name'] = $contentTemplateName;
 
        return $template->render($templateVariables);
    }
}