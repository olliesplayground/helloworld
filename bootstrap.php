<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use OlliesPlayground\HelloWorld\Gesture\Expression;
use OlliesPlayground\HelloWorld\Internationalize\Translation;

/**
 * Auto Loader
 */
require_once PROJECT_ROOT . '/vendor/autoload.php';

/**
 * Load Config
 */
require_once PROJECT_ROOT . '/config/default.php';

/**
 * Load Translation Class
 */
$translation = Translation::createWithPhpLoader(
    PROJECT_ROOT . $config['paths']['translations'],
    $config['default_locale']
);

/**
 * Load Expression Class
 */
$expression = new Expression($translation);

/**
 * Templating
 */
$loader = new FilesystemLoader(PROJECT_ROOT . $config['paths']['template']);
$twig = new Environment($loader, [
    'cache' => PROJECT_ROOT . $config['paths']['compilation_cache'],
]);
