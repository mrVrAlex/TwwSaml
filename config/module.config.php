<?php

return array(
    'router' => array(
        'routes' => array(
            'tww-simple-saml' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/saml/acs',
                    'defaults' => array(
                        'controller' => 'TwwSaml\Controller\Acs',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'TwwSaml\SamlAdapter'         => 'TwwSaml\ServiceFactory\SamlAdapterFactory',
            'TwwSaml\Controller\Acs'      => 'TwwSaml\Controller\AcsController',
            'TwwSaml\Controller\Metadata' => 'TwwSaml\Controller\MetadataController',
        ),
    ),
);
