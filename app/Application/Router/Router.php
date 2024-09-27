<?php

namespace App\Application\Router;

class Router implements RouterInterface{

     // Принимает список маршрутов, проверяет текущий URI и вызывает соответствующий метод контроллера
    public function handle(array $routes): void{
        $uri = $_SERVER['REQUEST_URI'];
            
        foreach($routes as $route){
            if($route['uri'] == $uri){
                // Создаем экземпляр контроллера
                $controller = new $route['controller'];
                // Получаем имя метода
                $method = $route['method'];
                // Вызываем метод контроллера
                $controller->$method();
            }
        }
    }
}

?>