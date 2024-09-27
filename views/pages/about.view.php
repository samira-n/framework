<?php
use App\Application\Views\View;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <?php View::component('head');?>
    <title><?= $title ?></title>
</head>
<body>
    <?php View::component('nav');?>
    <main>
        <div class="container">
            <div class="row mt-3">
                <h2>Welcome to <span class="badge text-bg-secondary">About page</span></h2>
            </div>
        </div>
    </main>
</body>
</html>