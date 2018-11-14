<?php
/**
 * Created by PhpStorm.
 * User: Jeroen
 * Date: 29-8-2018
 * Time: 16:14
 */

namespace App\Controller;

use App\Entity\Project\Project;
use App\Form\ProjectForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class ProjectController extends AbstractController
{
    /**
     * @Route("/admin/project", name="index_project")
     * @Template
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $projects = $em->getRepository("App:Project\Project")->findAll();

        return array(
            'projects' => $projects,

        );
    }

    /**
     * @Route("/admin/project/create", name="create_project")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function create(Request $request)
    {
        $project = new Project();
        $form = $this->createForm(ProjectForm::class, $project);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();

            $this->addFlash('success', 'Project successfully created.');

            return $this->redirectToRoute('index_project');
        }

        return [
            'form' => $form->createView(),
            'projects' => array($project)
        ];
    }

    /**
     * @Route("/admin/project/edit/{id}", name="edit_project")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function edit(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $project = $em->getRepository("App:Project\Project")->find($id);

        $form = $this->createForm(ProjectForm::class, $project);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();

            $this->addFlash('success', 'Project successfully edited.');

            return $this->redirectToRoute('index_project');
        }

        return [
            'form' => $form->createView(),
            'projects' => array($project)
        ];

    }


    /**
     * @Route("/admin/project/delete/{id}", name="delete_project")
     * @Method({"DELETE"})
     * @Template()
     */
    public function delete(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $project = $em->getRepository("App:Project\Project")->find($id);

        $em->remove($project);
        $em->flush();

        $this->addFlash('success', 'Project successfully removed.');

        return $this->redirectToRoute('index_project');
    }
}