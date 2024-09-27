<?php

namespace App\Application\Router;

interface RouterInterface{

    // Метод, отвечающий за обработку маршрутов
    public function handle(array $routes): void;

}

?>