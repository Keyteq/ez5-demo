<?php

use Symfony\Component\HttpFoundation\Request;

$loader = require_once __DIR__ . '/../ezpublish/autoload_plugins.php';
$loader = require_once __DIR__ . '/../ezpublish/autoload.php';

require_once __DIR__ . '/../ezpublish/EzPublishKernel.php';
require_once __DIR__ . '/../ezpublish/EzPublishCache.php';

$kernel = new EzPublishKernel( 'priv', true );
$kernel->loadClassCache();
// Uncomment the following to activate HttpCache.
//$kernel = new EzPublishCache( $kernel );
$request = Request::createFromGlobals();
$response = $kernel->handle( $request );
$response->send();
$kernel->terminate( $request, $response );
