<?php

namespace TwwSaml\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class AcsController extends AbstractActionController
{

    public function indexAction()
    {
        $serviceLocator = $this->getServiceManager();
        $config = $serviceLocator->get('Config');
        $auth = new \OneLogin_Saml2_Auth($config['tww-saml']['auth']);
        $auth->processResponse();

        $errors = $auth->getErrors();
        if (!empty($errors)) {
            print_r('<p>'.implode(', ', $errors).'</p>');
            exit();
        }

        if (!$auth->isAuthenticated()) {
            throw new \Exception('Authentication failed.');
        }

        $_SESSION['samlUserdata'] = $auth->getAttributes();
        if (isset($_POST['RelayState']) && \OneLogin_Saml2_Utils::getSelfURL() != $_POST['RelayState']) {
            $this->redirect()->toUrl($_POST['RelayState']);
        } else {
            $this->redirect()->toRoute('home');
        }
    }

}
