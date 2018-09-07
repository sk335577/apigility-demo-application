<?php
return [
    'view_manager' => [
        'display_exceptions' => true,
    ],
    'zf-apigility-admin' => [
        'path_spec' => 'psr-4',
    ],
    'zf-configuration' => [
        'enable_short_array' => true,
        'class_name_scalars' => true,
    ],
    'db' => [
        'adapters' => [
            'Comics Database Mysqli Adapter' => [
                'database' => 'zend_comics',
                'driver' => \Mysqli::class,
                'username' => 'root',
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authentication' => [
            'adapters' => [],
        ],
    ],
];
