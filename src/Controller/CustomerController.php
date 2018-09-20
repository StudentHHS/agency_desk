<?php
/**
 * Created by PhpStorm.
 * User: Jeroen
 * Date: 29-8-2018
 * Time: 16:14
 */

namespace App\Controller;


use App\Entity\User\Customer;
use App\Form\CustomerForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

#<!-- wanneer je een normale controller extend -->
#use Symfony\Bundle\FrameworkExtraBundle\Controller\Controller;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CustomerController extends AbstractController
{

    /**
     * @Route("/admin/customer", name="index_customer")
     * @Template
     */
    public function index()
    {
        $customer = new Customer();
        $form = $this->createForm(CustomerForm::class, $customer);

        return [
            'form' => $form->createView(),
            'customers' => array($customer)];
    }


    /**
     * @Route("/admin/customer/create", name="create_customer")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function create(Request $request)
    {
        $customer = new Customer();
        $form = $this->createForm(CustomerForm::class, $customer);

//        $form->handleRequest($request);

//        if ($form->isSubmitted() && $form->isValid()) {
//            $customer = $form->getData();
//
//            $entityManager = $this->getDoctrine()->getManager();
//            $entityManager->persist($customer);
//            $entityManager->flush();
//
//            return $this->redirectToRoute('admin_page');
//        }


        return [
            'form' => $form->createView(),
            'customers' => array($customer)];
    }


    /**
     * @Route("/admin/customer/edit/{id}", name="edit_customer")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function edit(Request $request, $id)
    {
        $klant = new Client();
        $klant = $this->getDoctrine()->getRepository(Client::class)->find($id);

        $form = $this->createFormBuilder($klant)
            ->add('name', TextareaType::class,
                array('required' => false, 'attr' => array('class' => 'forms-control')))
            ->add('function', TextareaType::class,
                array('required' => false, 'attr' => array('class' => 'forms-control')
                ))
            ->add('save', SubmitType::class, array(
                'label' => 'Confirm',
                'attr' => array('class' => 'btn btn-primary mt-3')
            ))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('index_klant');
        }

        return ['forms' => $form->createView()];
    }

    /**
     * @Route("/admin/customer/{id}", name="show_customer")
     * @Template()
     */
    public function show($id)
    {
        $klant = $this->getDoctrine()->getRepository(Client::class)->find($id);

        return ['customer' => $klant];
    }

    /**
     * @Route("/admin/customer/delete/{id}")
     * @Method({"DELETE"})
     * @Template()
     */
    public function delete(Request $request, $id)
    {
        $klant = $this->getDoctrine()->getRepository(Client::class)->find($id);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($klant);
        $entityManager->flush();

        $response = new Response();
        $response->send();
    }


}