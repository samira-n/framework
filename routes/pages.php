<?php

use App\Application\Router\Route;
use App\Controllers\PagesController;

Route::page('/framework/home', PagesController::class, 'home');
Route::page('/framework/about', PagesController::class, 'about');
Route::page('/framework/contacts', PagesController::class, 'contacts');

?>