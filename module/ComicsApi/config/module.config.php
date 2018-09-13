<?php
return [
    'service_manager' => [
        'factories' => [
            \ComicsApi\V1\Rest\Characters\CharactersResource::class => \ComicsApi\V1\Rest\Characters\CharactersResourceFactory::class,
            \ComicsApi\V1\Rest\Publishers\PublishersResource::class => \ComicsApi\V1\Rest\Publishers\PublishersResourceFactory::class,
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
            'comics-api.rest.publishers' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/publishers[/:publisher_id]',
                    'defaults' => [
                        'controller' => 'ComicsApi\\V1\\Rest\\Publishers\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            1 => 'comics-api.rest.characters',
            0 => 'comics-api.rest.publishers',
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
                1 => 'DELETE',
                2 => 'PATCH',
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
        'ComicsApi\\V1\\Rest\\Publishers\\Controller' => [
            'listener' => \ComicsApi\V1\Rest\Publishers\PublishersResource::class,
            'route_name' => 'comics-api.rest.publishers',
            'route_identifier_name' => 'publisher_id',
            'collection_name' => 'publishers',
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
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \ComicsApi\V1\Rest\Publishers\PublishersEntity::class,
            'collection_class' => \ComicsApi\V1\Rest\Publishers\PublishersCollection::class,
            'service_name' => 'Publishers',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'ComicsApi\\V1\\Rest\\Characters\\Controller' => 'HalJson',
            'ComicsApi\\V1\\Rest\\Publishers\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'ComicsApi\\V1\\Rest\\Characters\\Controller' => [
                0 => 'application/vnd.comics-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'ComicsApi\\V1\\Rest\\Publishers\\Controller' => [
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
            'ComicsApi\\V1\\Rest\\Publishers\\Controller' => [
                0 => 'application/vnd.comics-api.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \ComicsApi\V1\Rest\Characters\CharactersEntity::class => [
                'entity_identifier_name' => 'character_id',
                'route_name' => 'comics-api.rest.characters',
                'route_identifier_name' => 'character_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \ComicsApi\V1\Rest\Characters\CharactersCollection::class => [
                'entity_identifier_name' => 'character_id',
                'route_name' => 'comics-api.rest.characters',
                'route_identifier_name' => 'character_id',
                'is_collection' => true,
            ],
            \ComicsApi\V1\Rest\Publishers\PublishersEntity::class => [
                'entity_identifier_name' => 'publisher_id',
                'route_name' => 'comics-api.rest.publishers',
                'route_identifier_name' => 'publisher_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \ComicsApi\V1\Rest\Publishers\PublishersCollection::class => [
                'entity_identifier_name' => 'publisher_id',
                'route_name' => 'comics-api.rest.publishers',
                'route_identifier_name' => 'publisher_id',
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
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'name' => 'character_real_name',
                'error_message' => 'Character real name is mandatory',
            ],
            2 => [
                'required' => false,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\File\Size::class,
                        'options' => [
                            'max' => '5MB',
                        ],
                    ],
                    1 => [
                        'name' => \Zend\Validator\File\IsImage::class,
                        'options' => [],
                    ],
                ],
                'filters' => [],
                'name' => 'character_picture',
                'type' => \Zend\InputFilter\FileInput::class,
                'field_type' => 'file',
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
                    'DELETE' => false,
                ],
            ],
        ],
    ],
];
