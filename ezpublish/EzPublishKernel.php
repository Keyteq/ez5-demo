<?php
/**
 * File containing the EzPublishKernel class.
 *
 * @copyright Copyright (C) 1999-2013 eZ Systems AS. All rights reserved.
 * @license http://ez.no/eZPublish/Licenses/eZ-Trial-and-Test-License-Agreement-eZ-TTL-v2.0 eZ Trial and Test License Agreement Version 2.0
 * @version 5.1.0-beta1
 */

use eZ\Bundle\EzPublishCoreBundle\EzPublishCoreBundle;
use Egulias\ListenersDebugCommandBundle\EguliasListenersDebugCommandBundle;
use eZ\Bundle\EzPublishLegacyBundle\EzPublishLegacyBundle;
use eZ\Bundle\EzPublishRestBundle\EzPublishRestBundle;
use EzSystems\DemoBundle\EzSystemsDemoBundle;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Bundle\MonologBundle\MonologBundle;
use Symfony\Bundle\AsseticBundle\AsseticBundle;
use Symfony\Bundle\WebProfilerBundle\WebProfilerBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle;
use Tedivm\StashBundle\TedivmStashBundle;


class EzPublishKernel extends Kernel
{
    /**
     * Returns an array of bundles to registers.
     *
     * @return array An array of bundle instances.
     *
     * @api
     */
    public function registerBundles()
    {
        $bundles = array(
            new FrameworkBundle(),
            new SecurityBundle(),
            new TwigBundle(),
            new MonologBundle(),
            new AsseticBundle(),
            new SensioGeneratorBundle(),
            new TedivmStashBundle(),
            new EzPublishCoreBundle(),
            new EzPublishLegacyBundle(),
            new EzSystemsDemoBundle(),
            new EzPublishRestBundle(),
            new Keyteq\Bundle\DemoSiteBundle\KeyteqDemoSiteBundle(),
        );

        if ( $this->getEnvironment() === 'dev' ||
             $this->getEnvironment() === 'priv'
        )
        {
            $bundles[] = new WebProfilerBundle();
            $bundles[] = new EguliasListenersDebugCommandBundle();
        }

        return $bundles;
    }

    /**
     * Loads the container configuration
     *
     * @param LoaderInterface $loader A LoaderInterface instance
     *
     * @api
     */
    public function registerContainerConfiguration( LoaderInterface $loader )
    {
        $loader->load( __DIR__ . '/config/config_' . $this->getEnvironment() . '.yml' );
        try
        {
            $loader->load( __DIR__ . '/config/ezpublish_' . $this->getEnvironment() . '.yml' );
        }
        catch ( \InvalidArgumentException $e )
        {
            $loader->load( __DIR__ . '/config/ezpublish_setup.yml' );
        }
    }
}
