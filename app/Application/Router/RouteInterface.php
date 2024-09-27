<?php

namespace App\Application\Router;
interface RouteInterface{

    // Регистрация маршрута
    public static function page(string $uri, string $controller, string $method): void;

    // Возврат списка маршрутов
    public static function list(): array;
}
?>