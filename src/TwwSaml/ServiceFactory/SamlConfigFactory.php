<?php

/**
 * @author Benjamin Nolan <benjamin.nolan@vinari.co.uk>
 */

namespace TwwSaml\ServiceFactory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SamlConfigFactory implements FactoryInterface
{

    /**
     * {@inheritDoc}
     *
     * @return array
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');

        return $config['tww-saml'];
    }

}
