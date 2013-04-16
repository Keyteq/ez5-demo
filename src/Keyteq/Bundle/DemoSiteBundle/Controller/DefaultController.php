<?php

namespace Keyteq\Bundle\DemoSiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('KeyteqDemoSiteBundle:Default:index.html.twig', array('name' => $name));
    }
}
