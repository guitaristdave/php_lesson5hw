<?php

namespace Geekbrains\Application1;

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

final class Application
{

    private const APP_NAMESPACE = 'Geekbrains\Application1\Controllers\\';

    protected string $controllerName;
    protected string $methodName;
    private static array $config;

    public static function config(): array
    {
        return Application::$config;
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function run(): string
    {
        Application::$config = parse_ini_file('config.ini' , true);
        $routeArray = explode('/' , $_SERVER['REQUEST_URI']);
        if(isset($routeArray[1]) && $routeArray[1] != ''){
            $controllerName = $routeArray[1];
        } else{
            $controllerName = "page";
        }

        $this->controllerName = Application::APP_NAMESPACE . ucfirst($controllerName) . "Controller";

        if(class_exists($this->controllerName)){
            // пытаемся вызвать метод
            if(isset($routeArray[2]) && $routeArray[2] != ''){
                $methodName = $routeArray[2];
            } else{
                $methodName = "index";
            }

            $this->methodName = "action" . ucfirst($methodName);
            if(method_exists($this->controllerName , $this->methodName)){
                $controllerInstance = new $this->controllerName();
                return call_user_func_array(
                    [$controllerInstance , $this->methodName] ,
                    []
                );
            } else{
                header('HTTP/1.0 404 Not Found');
                $render = new Render();
                return $render->renderPage('error.twig', ["message" => 404]);
            }
        } else{
            header('HTTP/1.0 404 Not Found');
            $render = new Render();
            return $render->renderPage('error.twig', ["message" => 404]);
        }
    }



    public function render(array $pageVariables)
    {

    }
}