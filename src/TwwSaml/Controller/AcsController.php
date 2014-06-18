<?php

namespace TwwSaml\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class AcsController extends AbstractActionController
{

    public function indexAction()
    {
        $serviceLocator = $this->getServiceLocator();
        $config = $serviceLocator->get('Config');
        $auth = new \OneLogin_Saml2_Auth($config['tww-saml']['settings']);
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
            return $this->redirect()->toUrl($_POST['RelayState']);
        } else {
            return $this->redirect()->toRoute('home');
        }
    }

}
