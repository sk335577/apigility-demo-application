<?php

/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014-2016 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace MediaManager;

class Module {

    public function getConfig() {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig() {
        return [
            'factories' => [
                Model\MediaTable::class => function($sm) {
                    $tableGateway = $sm->get(Model\MediaTableGateway::class);
                    return new Model\MediaTable($tableGateway);
                },
                Model\MediaTableGateway::class => function ($sm) {
                    $dbAdapter = $container->get($sm->get('Comics Database Adapter'));
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Media());
                    return new TableGateway('sktd_media', $dbAdapter, null, $resultSetPrototype);
                },
                Service\MediaService::class => function ($sm) {
                    return new Service\MediaService($sm->get("Config"), Model\MediaTableGateway::class);
                }
            ],
        ];
    }

}
