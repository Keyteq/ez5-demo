<?php
/**
 * File containing the autoload configuration.
 * It uses Composer autoloader and is greatly inspired by the Symfony standard distribution's.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/eZPublish/Licenses/eZ-Trial-and-Test-License-Agreement-eZ-TTL-v2.0 eZ Trial and Test License Agreement Version 2.0
 * @version 5.1.0-beta1
 */

use Doctrine\Common\Annotations\AnnotationRegistry;

/* @var $loader \Composer\Autoload\ClassLoader */
$loader = require __DIR__.'/../plugins/autoload.php';

// intl
if ( !function_exists( 'intl_get_error_code' ) )
{
    require_once __DIR__.'/../vendor/symfony/symfony/src/Symfony/Component/Locale/Resources/stubs/functions.php';
    $loader->add( '', __DIR__.'/../vendor/symfony/symfony/src/Symfony/Component/Locale/Resources/stubs' );
}

AnnotationRegistry::registerLoader( array( $loader, 'loadClass' ) );

return $loader;
