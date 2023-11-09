<?php

namespace TestBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends FrontendController
{
    /**
     * @Route("/product")
     */
    public function indexAction(Request $request): Response
    {
        return new Response('Helelo');
    }
}
