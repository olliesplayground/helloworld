<?php

define('PUBLIC_DIR', __DIR__);
define('PROJECT_ROOT', PUBLIC_DIR . '/../');

require_once PROJECT_ROOT . 'bootstrap.php';

$locale = $_GET['locale'] ?? null;

echo $twig->render('layouts/web.twig', [
    'hello_world' => $expression->sayHello($locale)
]);
