<?php

namespace TwwSaml\Adapter;

use Zend\Authentication\AuthenticationService;
use Zend\Log\Logger;

class Saml
{

    /**
     * OneLogin auth instance
     *
     * @var \OneLogin_Saml_Auth
     */
    protected $auth;

    /**
     * Module configuration
     *
     * @var array
     */
    private $config;

    /**
     * OneLogin settings instance
     *
     * @var \OneLogin_Saml_Settings
     */
    protected $settings;

    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * Do the thing!
     */
    public function authenticate()
    {
        $this->auth = new \OneLogin_Saml2_Auth($this->config->auth);
        $this->auth->login();

        return $auth->isAuthenticated();
    }

}
