<?php
namespace ggapi;

use ZF\Apigility\Provider\ApigilityProviderInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use ggapi\V1\Rest\User\UserEntity;
use ggapi\V1\Rest\User\UserMapper;
use ggapi\V1\Rest\Profile\ProfileEntity;
use ggapi\V1\Rest\Profile\ProfileMapper;


class Module implements ApigilityProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
                'factories' => array(
                    /* USER API */
                        'ggapiUserTableGateway' => function($sm)
                        {
                             $dbAdapter = $sm->get('ggapi');
                             $resultSetPrototype = new ResultSet();
                             $resultSetPrototype->setArrayObjectPrototype(new UserEntity());
                             return new TableGateway('users', $dbAdapter, null, $resultSetPrototype);
                        },
                        'ggapi\V1\Rest\User\UserMapper' => function($sm)
                        {
                            $tableGateway = $sm->get('ggapiUserTableGateway');
                            return new UserMapper($tableGateway);
                        },
                    /* PROFILE API */
                        'ggapiProfileTableGateway' => function($sm)
                        {
                            $dbAdapter = $sm->get('ggapi');
                            $resultSetPrototype = new ResultSet();
                            $resultSetPrototype->setArrayObjectPrototype(new ProfileEntity());
                            return new TableGateway('profiles', $dbAdapter, null, $resultSetPrototype);
                        },
                        'ggapi\V1\Rest\Profile\ProfileMapper' => function($sm)
                        {
                            $tableGateway = $sm->get('ggapiProfileTableGateway');
                            return new ProfileMapper($tableGateway);
                        }
                    )
            );
    }

    public function getAutoloaderConfig()
    {
        return array(
            'ZF\Apigility\Autoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }
}
