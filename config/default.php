<?php

$config['paths'] = [
    'translations'      => 'i18n',
    'template'          => 'templates',
    'compilation_cache' => 'templates/cache'
];

$config['default_locale'] = 'en';

$config['cli_options'] = [
    'locale' => [
        'short' => 'l',
        'long' => 'locale'
    ]
];
