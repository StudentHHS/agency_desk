<?php
/**
 * Created by PhpStorm.
 * User: Jeroen
 * Date: 31-8-2018
 * Time: 11:07
 */

namespace App\Controller;

use App\Entity\Admin;

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
        $klanten= $this->getDoctrine()->getRepository(Admin::class)->findAll();

        return $this->render('admin/admin.html.twig', array
        ('klanten'=>$klanten));

    }


//    /**
//     * @Route("/admin/save")
//     */
//    public function save(){
//        $entityManager = $this->getDoctrine()->getManager();
//
//        $admin = new Admin();
//        $admin->setTitle('This is user nr. ' .$admin->getId());
//        $admin->setBody('Body for admin');
//
//        $entityManager->persist($admin);
//        $entityManager->flush();
//
//        return new Response('Saved the admin with an id of '.$admin->getId());
//    }

}