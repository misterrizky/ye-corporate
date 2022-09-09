<?php

return [
    'name' => 'Yada Ekidanta',
    'manifest' => [
        'name' => env('APP_NAME', 'Yada Ekidanta'),
        'short_name' => 'YE',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'icons' => [
            '72x72' => [
                'path' => '/img/icon.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/img/icon.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/img/icon.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/img/icon.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/img/icon.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/img/icon.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '/img/icon.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/img/icon.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/img/icon.png',
            '750x1334' => '/img/icon.png',
            '828x1792' => '/img/icon.png',
            '1125x2436' => '/img/icon.png',
            '1242x2208' => '/img/icon.png',
            '1242x2688' => '/img/icon.png',
            '1536x2048' => '/img/icon.png',
            '1668x2224' => '/img/icon.png',
            '1668x2388' => '/img/icon.png',
            '2048x2732' => '/img/icon.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/img/icon.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2'
            ]
        ],
        'custom' => []
    ]
];
