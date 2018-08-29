<?php
/**
 * Created by PhpStorm.
 * User: Jeroen
 * Date: 29-8-2018
 * Time: 16:14
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController
{

    /**
     * @Route("/")
     */
    public function index()
    {
        return new Response('This is the index page');
    }

    /**
     * @Route("/news/{slug}")
     */
    public function show($slug)
    {
        return new Response(sprintf(

            'This the page where new stuff is shown: %s',
            $slug
        ));
    }
}