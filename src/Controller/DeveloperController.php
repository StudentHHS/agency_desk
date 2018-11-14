<?php
/**
 * Created by PhpStorm.
 * User: Jeroen
 * Date: 29-8-2018
 * Time: 16:14
 */

namespace App\Controller;

use App\Entity\User\Developer;
use App\Form\DeveloperForm;
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

class DeveloperController extends AbstractController
{
    /**
     * @Route("/admin/developer", name="index_developer")
     * @Template
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $developers = $em->getRepository("App:User\Developer")->findAll();

        return array(
            'developers' => $developers,

        );
    }

    /**
     * @Route("/admin/developer/create", name="create_developer")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function create(Request $request)
    {
        $developer = new Developer();
        $form = $this->createForm(DeveloperForm::class, $developer);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($developer);
            $em->flush();

            $this->addFlash('success', 'Developer successfully created.');

            return $this->redirectToRoute('index_developer');
        }

        return [
            'form' => $form->createView(),
            'developers' => array($developer)
        ];
    }

    /**
     * @Route("/admin/developer/edit/{id}", name="edit_developer")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function edit(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $developer = $em->getRepository("App:User\Developer")->find($id);

        $form = $this->createForm(DeveloperForm::class, $developer);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($developer);
            $em->flush();

            $this->addFlash('success', 'Developer successfully edited.');

            return $this->redirectToRoute('index_developer');
        }

        return [
            'form' => $form->createView(),
            'developers' => array($developer)
        ];
    }

    /**
     * @Route("/admin/developer/delete/{id}", name="delete_developer")
     * @Method({"DELETE"})
     * @Template()
     */
    public function delete(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $developer = $em->getRepository("App:User\Developer")->find($id);

        $em->remove($developer);
        $em->flush();

        $this->addFlash('success', 'Developer successfully removed.');

        return $this->redirectToRoute('index_developer');
    }
}