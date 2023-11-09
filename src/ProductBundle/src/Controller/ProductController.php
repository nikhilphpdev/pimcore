<?php

namespace ProductBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends FrontendController
{
    /**
     * @Route("/create-variant",methods={GET})
     */
    public function createVariantAction(Request $request): Response
    {
        return new Response('Hello world from product');die;
    }
}
