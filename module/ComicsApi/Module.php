<?php

namespace ComicsApi;

use ZF\Apigility\Provider\ApigilityProviderInterface;
use Zend\Db\Adapter\AdapterAbstractServiceFactory;
use ComicsApi\V1\Rest\Characters\CharactersMapper;
use ComicsApi\V1\Rest\Characters\CharactersService;
use MediaManager\Service\MediaService;

class Module implements ApigilityProviderInterface {

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {

        return [
            'ZF\Apigility\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }

    public function getServiceConfig() {
        return [
            'factories' => [
                CharactersMapper::class => function ($sm) {
                    return new CharactersMapper($sm->get('Comics Database Adapter'));
                },
                CharactersService::class => function ($sm) {
                    return new CharactersService($sm->get(CharactersMapper::class), $sm->get(MediaService::class));
                }
            ]
        ];
    }

}
