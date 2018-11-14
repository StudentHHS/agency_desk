<?php
/**
 * Created by PhpStorm.
 * User: Jeroen
 * Date: 14-11-2018
 * Time: 14:57
 */

namespace App\Controller;

use App\Entity\Project\Task;
use App\Form\TaskForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{

    /**
     * @Route("/admin/task", name="index_task")
     * @Template
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $tasks = $em->getRepository("App:Project\Task")->findAll();

        return array(
            'tasks' => $tasks,
        );
    }

    /**
     * @Route("/admin/task/create", name="create_task")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function create(Request $request)
    {
        $task = new Task();
        $form = $this->createForm(TaskForm::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();

            $this->addFlash('success', 'Task successfully created.');

            return $this->redirectToRoute('index_task');
        }

        return [
            'form' => $form->createView(),
            'tasks' => array($task)
        ];
    }

    /**
     * @Route("/admin/task/edit/{id}", name="edit_task")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function edit(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $task = $em->getRepository("App:Project\Task")->find($id);

        $form = $this->createForm(TaskForm::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();

            $this->addFlash('success', 'Task successfully edited.');

            return $this->redirectToRoute('index_task');
        }

        return [
            'form' => $form->createView(),
            'tasks' => array($task)
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
        $task = $em->getRepository("App:Project\Task")->find($id);

        $em->remove($task);
        $em->flush();

        $this->addFlash('success', 'Task successfully removed.');

        return $this->redirectToRoute('index_task');
    }

}