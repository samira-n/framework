<?php

namespace App\Application\Views;

use App\Application\Config\Config;
use App\Exceptions\ComponentNotFoundException;
use App\Exceptions\ViewNotFoundException;

class View implements ViewInterface{

    public static function show(string $view, array $params = []): void{
        //создаем переменые по ключу, которые передадим в массиве вторым аргументом в PagesController.php, на странице на месте title вызовем переменную
        extract($params);
        $path = __DIR__ . "/../../../views/$view.view.php";
        if(!file_exists($path)){
            throw new ViewNotFoundException("View ($view) not found");
        }
        include $path;
    }

    public static function exception(\Exception $e): void{
        // extract создаст переменные по названию ключа в массиве с переданным значением
        extract([
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
        $config = include __DIR__ . "../../../../config/app.php";
        $path = __DIR__ . "/../../../views/" . Config::get('app.exception_view') . ".view.php";


        //если вдруг шаблона с выводом ошибок не станет (exception.view.php), красивая обработка ошибок придет на помощь :) 
        if(!file_exists($path)){
            echo $e->getMessage() . "<br><hr>";
            echo "<pre>{$e->getTraceAsString()}</pre>";
            return;
        }
        include $path;
    }

    public static function component(string $component): void{
        $path = __DIR__ . "/../../../views/components/$component.component.php";
        if(!file_exists($path)){
            throw new ComponentNotFoundException("Component ($component) not found");
        }
        include $path;
    }
}
?>