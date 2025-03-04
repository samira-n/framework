<?php

namespace App\Controllers;
use App\Application\Views\View;

class PagesController{

    public function home(): void{
        View::show('pages/home', [
            'title' => 'Home'
        ]);
    }

    public function about(): void{
        View::show('pages/about', [
            'title' => 'About'
        ]);
    }

    public function contacts(): void{
        View::show('pages/contacts', [
            'title' => 'Contacts'
        ]);
    }
}
?>