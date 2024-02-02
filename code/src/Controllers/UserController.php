<?php

namespace Geekbrains\Application1\Controllers;

use Exception;
use Geekbrains\Application1\Render;
use Geekbrains\Application1\Models\User;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class UserController
{

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function actionIndex(): string
    {
        $users = User::getAllUsersFromStorage();

        $render = new Render();

        if(!$users){
            return $render->renderPage(
                'user-empty.twig' ,
                [
                    'title' => 'Список пользователей в хранилище' ,
                    'message' => "Список пуст или не найден"
                ]);
        } else{
            return $render->renderPage(
                'user-index.twig' ,
                [
                    'title' => 'Список пользователей в хранилище' ,
                    'users' => $users
                ]);
        }
    }

    /**
     * @throws Exception
     */
    public function actionSave(): string
    {
        if(!array_key_exists("name" , $_GET)
            or !array_key_exists("birthday" , $_GET)
            or $_GET["name"] === ''
            or $_GET["birthday"] === ''){
            return $this->actionIndex();
        }

        $render = new Render();
        $user = new User($_GET["name"] , $_GET["birthday"]);
        $message = User::addUser($user) ? 'Операция выполнена успешно' : 'Операция не выполнена';

        return $render->renderPage(
            'user-added.twig' , [
                'title' => 'Добавление пользователя в хранилище' ,
                "message" => $message
            ]
        );

    }
}