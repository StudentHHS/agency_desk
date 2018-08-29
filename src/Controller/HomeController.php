<?php
/**
 * Created by PhpStorm.
 * User: Jeroen
 * Date: 29-8-2018
 * Time: 16:14
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
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

            return $this->render('article/show.html.twig', [
                'title' => ucwords(str_replace('-', ' ', $slug)),

                ]);

    }
}