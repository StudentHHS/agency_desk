<?php
/**
 * Created by PhpStorm.
 * User: Jeroen
 * Date: 31-8-2018
 * Time: 11:07
 */

namespace App\Controller;

use App\Entity\Client;
use App\Entity\User\Customer;
use function PHPSTORM_META\type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_page")
     */
    public function index()
    {
        $customers = $this->getDoctrine()->getRepository(Customer::class)->findAll();
        return $this->render('admin/admin.html.twig', array
        ('customers' => $customers));
    }
//    /**
//     * @Route("/admin/save")
//     */
//    public function save(){
//        $entityManager = $this->getDoctrine()->getManager();
//
//        $client = new Client();
//        $client->setName('This is the name of the client');
//        $client->setFunction('Function of the client');
//
//        $entityManager->persist($client);
//        $entityManager->flush();
//
//        return new Response('Saves the client with an id of '.$client->getId());
//    }
//    /**
//     * @Route("/admin/new", name="new_client")
//     * @Method({"GET", "POST"})
//     */
//
//    public function new(Request $reguest)
//    {
//        $admin = new Client();
//
//        $forms = $this->createFormBuilder($admin)
//            ->add('name', TextType::class,
//            array('attr' => array('class', 'forms-control')))
//            ->add('function', TextareaType::class, array(
//                'required' => false,
//                'attr' => array('class' => 'forms-control')
//            ))
//            ->add('save', SubmitType::class, array(
//                'label' => 'Create',
//                'attr' => array('class' => 'btn btn-primary mt-3')
//            ))
//            ->getForm();
//
//        return $this->render('customer/create.html.twig', array(
//            'forms' => $forms->createView()
//        ));
//    }
//
//    /**
//     * @Route("/admin/{id}", name="show_client")
//     */
//    public function show($id)
//    {
//        $customer = $this->getDoctrine()->getRepository(Client::class)->find($id);
//
//        return $this->render('index.html.twig', array
//        ('customer' => $customer));
//    }
//
}