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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

#<!-- wanneer je een normale controller extend -->
#use Symfony\Bundle\FrameworkExtraBundle\Controller\Controller;

class HomeController extends AbstractController
{

    /**
     * @Route("/")
     * @Method({"GET"})
     */
    public function index()
    {
        return $this->render('article/show.html.twig');
    }

    /**
     * @Route("/news/{slug}")
     */
    public function show($slug)
    {

        $comments = [
            'This is the first sentence',
            'This is the second sentence',
            'This is the last sentence',
        ];

        return $this->render('article/show.html.twig', [
                'title' => ucwords(str_replace('-', ' ', $slug)),
                'comments' => $comments,
        ]);

    }
}