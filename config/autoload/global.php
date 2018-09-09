<?php

return [
    'zf-content-negotiation' => [
        'selectors' => [],
    ],
    'db' => [
        //Default database connection which we can use with specifying its name
        //$container->get(\Zend\Db\Adapter\AdapterInterface::class);
//        'driver' => 'Mysqli',
//        'database' => 'zend_comics',
//        'hostname' => 'localhost',
//        'username' => 'root',
//        'password' => '',
//        'driver_options' => [
//            'buffer_results' => true,
//            'MYSQLI_INIT_COMMAND' => " SET SESSION time_zone = '+00:00';"
//        ],
        'adapters' => [
            'Comics Database Adapter' => [],
        ],
    ],
    'view_manager' => [
        'strategies' => [
            0 => 'ViewJsonStrategy',
        ],
    ],
    'service_manager' => [
        'factories' => [
            'ZF\\OAuth2\\Service\\OAuth2Server' => \ZF\MvcAuth\Factory\NamedOAuth2ServerFactory::class,
        ],
    ],
    'zf-mvc-auth' => [
        'authentication' => [
            'map' => [
                'SuperheroesAPI\\V1' => 'superheroes auth adapter (http basic)',
                'ComicsApi\\V1' => 'http basic authentication adapter',
            ],
        ],
    ],
    'router' => [
        'routes' => [],
    ],
];
