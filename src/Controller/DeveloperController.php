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

use App\Entity\Developer;

class DeveloperController extends AbstractController
{

    /**
     * @Route("/admin/developer", name="index_developer")
     * @Template
     */
    public function index()
    {
        $developers = $this->getDoctrine()->getRepository(Developer::class)->findAll();

        return ['developers' => $developers];
    }


    /**
     * @Route("/admin/developer/create", name="create_developer")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function create(Request $request)
    {
        $developer = new Developer();

        $form = $this->createFormBuilder($developer)
            ->add('name', TextareaType::class,
                array('required' => false, 'attr' => array('class' => 'form-control')))
            ->add('function', TextareaType::class,
                array('required' => false, 'attr' => array('class' => 'form-control')
                ))
            ->add('save', SubmitType::class, array(
                'label' => 'Create',
                'attr' => array('class' => 'btn btn-primary mt-3')
            ))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $developer = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($developer);
            $entityManager->flush();

            return $this->redirectToRoute('index_developer');
        }


        return ['form' => $form->createView()];
    }


    /**
     * @Route("/admin/developer/edit/{id}", name="edit_developer")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function edit(Request $request, $id)
    {
        $developer = new Developer();
        $developer = $this->getDoctrine()->getRepository(Developer::class)->find($id);

        $form = $this->createFormBuilder($developer)
            ->add('name', TextareaType::class,
                array('required' => false, 'attr' => array('class' => 'form-control')))
            ->add('function', TextareaType::class,
                array('required' => false, 'attr' => array('class' => 'form-control')
                ))
            ->add('save', SubmitType::class, array(
                'label' => 'Create',
                'attr' => array('class' => 'btn btn-primary mt-3')
            ))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('index_developer');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/admin/developer/{id}", name="show_developer")
     * @Template()
     */
    public function show($id)
    {
        $developer = $this->getDoctrine()->getRepository(Developer::class)->find($id);

        return ['developer' => $developer];
    }

    /**
     * @Route("/admin/developer/delete/{id}")
     * @Method({"DELETE"})
     * @Template()
     */
    public function delete(Request $request, $id)
    {
        $developer = $this->getDoctrine()->getRepository(Developer::class)->find($id);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($developer);
        $entityManager->flush();

        $response = new Response();
        $response->send();
    }


}