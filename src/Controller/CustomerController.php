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
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

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

        $em = $this->getDoctrine()->getManager();
        $customers = $em->getRepository("App:User\Customer")->findAll();

        return array(
            'customers' => $customers,
        );

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

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($customer);
            $em->flush();

            $this->addFlash('success', 'Customer successfully created.');

            return $this->redirectToRoute('index_customer');
        }

        return [
            'form' => $form->createView(),
            'customers' => array($customer)
        ];

    }


    /**
     * @Route("/admin/customer/edit/{id}", name="edit_customer")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function edit(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $customer = $em->getRepository("App:User\Customer")->find($id);

        $form = $this->createForm(CustomerForm::class, $customer);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($customer);
            $em->flush();

            $this->addFlash('success', 'Customer successfully edited.');

            return $this->redirectToRoute('index_customer');
        }

        return [
            'form' => $form->createView(),
            'customers' => array($customer)
        ];
    }


    /**
     * @Route("/admin/customer/delete/{id}", name="delete_customer")
     * @Method({"DELETE"})
     * @Template()
     */
    public function delete(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $customer = $em->getRepository("App:User\Customer")->find($id);

        $em->remove($customer);
        $em->flush();

        $this->addFlash('success', 'Customer successfully removed.');

        return $this->redirectToRoute('index_customer');
    }


}