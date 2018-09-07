<?php
return [
    'zf-content-negotiation' => [
        'selectors' => [],
    ],
    'db' => [
        'adapters' => [
            'Comics Database Mysqli Adapter' => [],
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
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'oauth' => [
                'options' => [
                    'spec' => '%oauth%',
                    'regex' => '(?P<oauth>(/oauth))',
                ],
                'type' => 'regex',
            ],
        ],
    ],
];
