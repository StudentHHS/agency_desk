<?php
/**
 * Created by PhpStorm.
 * User: Jeroen
 * Date: 31-8-2018
 * Time: 11:07
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class AdminController extends AbstractController
{


    /**
     * @Route("/admin")
     */
    public function index()
    {
        $klanten= ['Klant 1', 'Klant 2', 'Klant 3', 'Klant 4'];

        return $this->render('admin/admin.html.twig', array
        ('klanten'=>$klanten));

    }


}