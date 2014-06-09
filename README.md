TwwSaml
=======

**NOTE:** This module is still very much a work in progress. Do not expect it to work until numbered versions start appearing in the repository tags!

This module integrates [OneLogin's php-saml](https://github.com/onelogin/php-saml) library with ZfcUser.

Installation
------------

The recommended method of installation for this module is via composer. You can either add the dependency with the following command:

    php composer.php require twowholeworms/tww-saml:dev-master

Alternatively, add the following line to your root `composer.json` file:

    "twowholeworms/tww-saml":"dev-master"

Basic configuration
-------------------

To enable the module after installation, add `'TwwSaml'` to the modules section of `application.config.php` as follows:

    return array(
        …
        'modules' => array(
            'Application',
            'TwwSaml'
        ),
        …
    );

Next, copy `tww-saml.local.php.dist` to `config/autoload/tww-saml.local.php` and modify the settings as documented.
