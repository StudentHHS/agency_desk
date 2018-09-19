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
use App\Entity\Project;

class ProjectController extends AbstractController
{
    /**
     * @Route("/admin/project", name="index_project")
     * @Template
     */
    public function index()
    {
        $projecten = $this->getDoctrine()->getRepository(Project::class)->findAll();
        return ['projecten' => $projecten];
    }

    /**
     * @Route("/admin/project/create", name="create_project")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function create(Request $request)
    {
        $project = new Project();
        $form = $this->createFormBuilder($project)
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
            $project = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($project);
            $entityManager->flush();
            return $this->redirectToRoute('index_project');
        }
        return ['forms' => $form->createView()];
    }

    /**
     * @Route("/admin/project/edit/{id}", name="edit_project")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function edit(Request $request, $id)
    {
        $project = new Project();
        $project = $this->getDoctrine()->getRepository(Project::class)->find($id);
        $form = $this->createFormBuilder($project)
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
            return $this->redirectToRoute('index_project');
        }
        return ['forms' => $form->createView()];
    }

    /**
     * @Route("/admin/project/{id}", name="show_project")
     * @Template()
     */
    public function show($id)
    {
        $project = $this->getDoctrine()->getRepository(Project::class)->find($id);
        return ['project' => $project];
    }

    /**
     * @Route("/admin/project/delete/{id}")
     * @Method({"DELETE"})
     * @Template()
     */
    public function delete(Request $request, $id)
    {
        $project = $this->getDoctrine()->getRepository(Project::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($project);
        $entityManager->flush();
        $response = new Response();
        $response->send();
    }
}