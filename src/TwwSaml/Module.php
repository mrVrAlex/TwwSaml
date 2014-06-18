<?php

namespace TwwSaml;

use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Mvc\MvcEvent;

class Module implements ServiceProviderInterface
{

    public function onBootstrap(MvcEvent $e)
    {
        define("TOOLKIT_PATH", __DIR__ . '/../../../../../vendor/onelogin/php-saml/');
        require_once(TOOLKIT_PATH . '_toolkit_loader.php');
    }

    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\ClassMapAutoloader' => [
                    __DIR__ . '/autoload_classmap.php'
            ],
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/../../src/' . __NAMESPACE__,
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                'TwwSaml\\SamlAdapter' => 'TwwSaml\\ServiceFactory\\SamlAdapterFactory',
                'TwwSaml\\SamlConfig'  => 'TwwSaml\\ServiceFactory\\SamlConfigFactory',
            ],
        ];
    }

}
