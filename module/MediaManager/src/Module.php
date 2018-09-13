<?php

/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014-2016 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace MediaManager;

use MediaManager\Model\Media;
use MediaManager\Model\MediaTable;
use MediaManager\Service\MediaService;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module {

    public function getConfig() {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig() {
        return [
            'factories' => [
                MediaTable::class => function($sm) {
                    $tableGateway = $sm->get(MediaTableGateway::class);
                    return new MediaTable($tableGateway);
                },
                MediaService::class => function ($sm) {
                    $tableGateway = $sm->get(MediaTable::class);
                    return new MediaService($sm->get("Config"), $tableGateway);
                },
                MediaTableGateway::class => function ($sm) {
                    $dbAdapter = $sm->get('Comics Database Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Media());
                    return new TableGateway('sktd_media', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }

}
