TwwSimpleSaml
=============

This module adds (SimpleSAMLphp)[https://simplesamlphp.org] integration to ZF2.

Installation
------------

The recommended method of installation for this module is via composer. You can either add the dependency with the following command:

    php composer.php require twowholeworms/tww-simple-saml:dev-master

Alternatively, add the following line to your root `composer.json` file:

    "twowholeworms/tww-simple-saml":"dev-master"

Basic configuration
-------------------

To enable the module after installation, add `'TwwSimpleSaml'` to the modules section of `application.config.php` as follows:

    return array(
        …
        'modules' => array(
            'Application',
            'TwwSimpleSaml'
        ),
        …
    );

Next, copy `tww-simple-saml.local.php.dist` to `config/autoload/tww-simple-saml.local.php` and modify the settings as documented.
