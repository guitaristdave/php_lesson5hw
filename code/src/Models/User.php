<?php

namespace Geekbrains\Application1\Models;

use Exception;
use Geekbrains\Application1\Application;

class User
{

    private ?string $userName;
    private ?string $userBirthday;

    private static string $storageAddress = "/storage/birthdays.json";

    public function __construct(string $name = null , string $birthday = null)
    {
        $this->userName = $name;
        $this->userBirthday = $birthday;
    }

    public function setName(string $userName): void
    {
        $this->userName = $userName;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function getUserBirthday(): string
    {
        return $this->userBirthday;
    }

    public function setBirthdayFromString(string $birthdayString): void
    {
        $this->userBirthday = strtotime($birthdayString);
    }

    public static function getAllUsersFromStorage(): array|false
    {
        $address = $_SERVER['DOCUMENT_ROOT'] . User::$storageAddress;

        if(file_exists($address) && is_readable($address)){
            $file = file_get_contents($address);
            $fileData = json_decode($file , true);

            $users = [];

            foreach($fileData as $item){
                $user = new User($item["name"]);
                $user->setBirthdayFromString($item["birthday"]);

                $users[] = $user;
            }

            return $users;
        } else{
            return false;
        }
    }

    /**
     * @throws Exception
     */
    static function addUser(User $user): bool
    {
        $name = $user->getUserName();
        $birthday = $user->getUserBirthday();

        $path = $_SERVER['DOCUMENT_ROOT'] . User::$storageAddress;

        if (!file_exists($path) || !is_writable($path)) {
            // Создать файл, если его нет
            if (!file_put_contents($path, '[]')) {
                throw new Exception("Не удалось создать или записать в файл.");
            }
        }

        $file = file_get_contents($path);
        $fileData = json_decode($file, true);

        $fileData[] = [
            "name" => $name,
            "birthday" => $birthday
        ];

        $fileHandler = fopen($path, "w"); // Используйте "w" для записи данных
        if ($fileHandler === false) {
            throw new Exception("Не удалось открыть файл для записи.");
        }

        $jsonEncodedData = json_encode($fileData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        if (fwrite($fileHandler, $jsonEncodedData) === false) {
            fclose($fileHandler);
            throw new Exception("Ошибка записи данных. Данные не сохранены.");
        }

        fclose($fileHandler);
        return true;
    }

}