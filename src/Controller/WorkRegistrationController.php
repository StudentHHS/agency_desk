<?php
/**
 * Created by PhpStorm.
 * User: Jeroen
 * Date: 23-10-2018
 * Time: 17:22
 */

namespace App\Controller;

use App\Entity\Project\ActualWork;
use App\Form\ActualWorkForm;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class WorkRegistrationController extends AbstractController
{

    /**
     * @Route("/admin/workregistration", name="index_workregistration")
     * @Template()
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $work = $em->getRepository("App:Project\ActualWork")->findAll();

        return [
            'work' => $work,
        ];
    }

    /**
     * @Route("/admin/workregistration/create", name="create_workregistration")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function create(Request $request)
    {

        $work = new ActualWork();
        $form = $this->createForm(ActualWorkForm::class, $work);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($work);
            $em->flush();
            return $this->redirectToRoute('index_workregistration');
        }

        return [
            'form' => $form->createView(),
            'work' => array($work)
        ];

    }


    /**
     * @Route("/admin/workregistration/edit/{id}", name="edit_workregistration")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function edit(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $work = $em->getRepository("App:Project\ActualWork")->find($id);

        $form = $this->createForm(ActualWorkForm::class, $work);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($work);
            $em->flush();
            return $this->redirectToRoute('index_workregistration');
        }

        return [
            'form' => $form->createView(),
            'work' => array($work)
        ];
    }


    /**
     * @Route("/admin/workregistration/delete/{id}", name="delete_workregistration")
     * @Method({"DELETE"})
     * @Template()
     */
    public function delete(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $work = $em->getRepository("App:Project\ActualWork")->find($id);

        $em->remove($work);
        $em->flush();

        return $this->redirectToRoute('index_workregistration');
    }

}