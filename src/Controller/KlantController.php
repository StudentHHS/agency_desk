<?php
/**
 * Created by PhpStorm.
 * User: Jeroen
 * Date: 29-8-2018
 * Time: 16:14
 */

namespace App\Controller;


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

use App\Entity\Client;

class KlantController extends AbstractController
{

    /**
     * @Route("/admin/klant", name="index_klant")
     * @Template
     */
    public function index()
    {
        $klanten = $this->getDoctrine()->getRepository(Client::class)->findAll();

        return ['klanten' => $klanten];
    }


    /**
     * @Route("/admin/klant/create", name="create_klant")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function create(Request $request)
    {
        $klant = new Client();

        $form = $this->createFormBuilder($klant)
            ->add('name', TextareaType::class,
                array('required' => false, 'attr' => array('class' => 'form-control')))
            ->add('function', TextareaType::class,
                array('required' => false, 'attr' => array('class' => 'form-control')
                ))
            ->add('save', SubmitType::class, array(
                'label' => 'Confirm',
                'attr' => array('class' => 'btn btn-primary mt-3')
            ))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $klant = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($klant);
            $entityManager->flush();

            return $this->redirectToRoute('index_klant');
        }


        return ['form' => $form->createView()];
    }


    /**
     * @Route("/admin/klant/edit/{id}", name="edit_klant")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function edit(Request $request, $id)
    {
        $klant = new Client();
        $klant = $this->getDoctrine()->getRepository(Client::class)->find($id);

        $form = $this->createFormBuilder($klant)
            ->add('name', TextareaType::class,
                array('required' => false, 'attr' => array('class' => 'form-control')))
            ->add('function', TextareaType::class,
                array('required' => false, 'attr' => array('class' => 'form-control')
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

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/admin/klant/{id}", name="show_klant")
     * @Template()
     */
    public function show($id)
    {
        $klant = $this->getDoctrine()->getRepository(Client::class)->find($id);

        return ['klant' => $klant];
    }

    /**
     * @Route("/admin/klant/delete/{id}")
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