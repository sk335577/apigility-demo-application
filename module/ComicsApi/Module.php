<?php

namespace ComicsApi;

use ZF\Apigility\Provider\ApigilityProviderInterface;
use Zend\Db\Adapter\AdapterAbstractServiceFactory;
use Application;

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
                V1\Rest\Characters\CharactersMapper::class => function ($sm) {
                    return new V1\Rest\Characters\CharactersMapper($sm->get('Comics Database Adapter'));
                },
                V1\Rest\Characters\CharactersService::class => function ($sm) {
                    return new V1\Rest\Characters\CharactersService($sm->get(V1\Rest\Characters\CharactersMapper::class));
                }
            ]
        ];
    }

}
