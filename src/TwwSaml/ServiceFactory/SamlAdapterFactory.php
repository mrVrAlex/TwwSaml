<?php

/**
 * @author Benjamin Nolan <benjamin.nolan@vinari.co.uk>
 */

namespace TwwSaml\ServiceFactory;

use TwwSaml\Adapter\Saml as SamlAdapter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SamlAdapterFactory implements FactoryInterface
{

    /**
     * {@inheritDoc}
     *
     * @return array
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('TwwSaml\\Config\\Saml');
        return new SamlAdapter($config);
    }

}
