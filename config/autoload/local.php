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
        //Default database connection which we can use with specifying its name
        //$container->get(\Zend\Db\Adapter\AdapterInterface::class);
//        'driver' => 'Mysqli',
//        'database' => 'junk_albums',
//        'hostname' => 'localhost',
//        'username' => 'root',
//        'password' => '',
//        'driver_options' => [
//            'buffer_results' => true,
//            'MYSQLI_INIT_COMMAND' => " SET SESSION time_zone = '+00:00';"
//        ],
        'adapters' => [
            'Comics Database Adapter' => [
                'database' => 'zend_comics',
                'driver' => 'PDO_Mysql',
                'username' => 'root',
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authentication' => [
            'adapters' => [
                'oauth2 authentication adapter' => [
                    'adapter' => \ZF\MvcAuth\Authentication\OAuth2Adapter::class,
                    'storage' => [
                        'adapter' => \pdo::class,
                        'dsn' => 'mysql:host=localhost;dbname=zend_comics',
                        'route' => '/oauth',
                        'username' => 'root',
                    ],
                ],
                'http basic authentication adapter' => [
                    'adapter' => \ZF\MvcAuth\Authentication\HttpAdapter::class,
                    'options' => [
                        'accept_schemes' => [
                            0 => 'basic',
                        ],
                        'realm' => 'Apigility Demo Application',
                        'htpasswd' => 'data/htpasswd/.htpasswd',
                    ],
                ],
            ],
        ],
    ],
];
