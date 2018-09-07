<?php
return [
    'service_manager' => [
        'factories' => [
            \ComicsApi\V1\Rest\Characters\CharactersResource::class => \ComicsApi\V1\Rest\Characters\CharactersResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'comics-api.rest.characters' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/characters[/:character_id]',
                    'defaults' => [
                        'controller' => 'ComicsApi\\V1\\Rest\\Characters\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            1 => 'comics-api.rest.characters',
        ],
    ],
    'zf-rest' => [
        'ComicsApi\\V1\\Rest\\Characters\\Controller' => [
            'listener' => \ComicsApi\V1\Rest\Characters\CharactersResource::class,
            'route_name' => 'comics-api.rest.characters',
            'route_identifier_name' => 'character_id',
            'collection_name' => 'characters',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [
                0 => 'page_size',
            ],
            'page_size' => 25,
            'page_size_param' => 'page_size',
            'entity_class' => \ComicsApi\V1\Rest\Characters\CharactersEntity::class,
            'collection_class' => \ComicsApi\V1\Rest\Characters\CharactersCollection::class,
            'service_name' => 'Characters',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'ComicsApi\\V1\\Rest\\Characters\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'ComicsApi\\V1\\Rest\\Characters\\Controller' => [
                0 => 'application/vnd.comics-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'ComicsApi\\V1\\Rest\\Characters\\Controller' => [
                0 => 'application/vnd.comics-api.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \ComicsApi\V1\Rest\Characters\CharactersEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'comics-api.rest.characters',
                'route_identifier_name' => 'character_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \ComicsApi\V1\Rest\Characters\CharactersCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'comics-api.rest.characters',
                'route_identifier_name' => 'character_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-content-validation' => [
        'ComicsApi\\V1\\Rest\\Characters\\Controller' => [
            'input_filter' => 'ComicsApi\\V1\\Rest\\Characters\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'ComicsApi\\V1\\Rest\\Characters\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                        'options' => [],
                    ],
                    1 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'name' => 'character_name',
                'description' => 'Name of the character',
                'field_type' => 'text',
                'error_message' => 'Character name is mandatory',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'real_name',
                'field_type' => 'text',
                'description' => 'Real name of the character',
                'error_message' => 'Real name',
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'ComicsApi\\V1\\Rest\\Characters\\Controller' => [
                'collection' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => true,
                ],
            ],
        ],
    ],
];
