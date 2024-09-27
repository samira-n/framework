<?php

namespace App\Application\Router;

class Route implements RouteInterface{

    private static array $routes;

    // Принимает URI маршрута, контроллер и метод, который будет вызван при совпадении URI
    public static function page(string $uri, string $controller, string $method): void{
        self::$routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    // Метод для возврата всех зарегистрированных маршрутов
    public static function list(): array{
        return self::$routes;
    }
}

?>