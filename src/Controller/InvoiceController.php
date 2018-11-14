<?php
/**
 * Created by PhpStorm.
 * User: Jeroen
 * Date: 28-9-2018
 * Time: 11:51
 */

namespace App\Controller;

use App\Entity\Financial\Invoice;
use App\Form\InvoiceForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class InvoiceController extends AbstractController
{

    /**
     * @Route("/admin/invoice", name="index_invoice")
     * @Template
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $invoices = $em->getRepository("App:Financial\Invoice")->findAll();

        return array(
            'invoices' => $invoices,

        );
    }

    /**
     * @Route("/admin/invoice/create", name="create_invoice")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function create(Request $request)
    {
        $invoice = new Invoice();
        $form = $this->createForm(InvoiceForm::class, $invoice);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($invoice);
            $em->flush();

            $this->addFlash('success', 'Invoice successfully created.');

            return $this->redirectToRoute('index_invoice');
        }

        return [
            'form' => $form->createView(),
            'invoices' => array($invoice)
        ];
    }

    /**
     * @Route("/admin/invoice/edit/{id}", name="edit_invoice")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function edit(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $invoice = $em->getRepository("App:Financial\Invoice")->find($id);

        $form = $this->createForm(InvoiceForm::class, $invoice);

        $form['paymentDate']->setData(new \DateTime());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($invoice);
            $em->flush();

            $this->addFlash('success', 'Invoice successfully edited.');

            return $this->redirectToRoute('index_invoice');
        }

        return [
            'form' => $form->createView(),
            'invoices' => array($invoice)
        ];

    }


    /**
     * @Route("/admin/invoice/delete/{id}", name="delete_invoice")
     * @Method({"DELETE"})
     * @Template()
     */
    public function delete(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $invoice = $em->getRepository("App:Financial\Invoice")->find($id);

        $em->remove($invoice);
        $em->flush();

        $this->addFlash('success', 'Invoice successfully removed.');

        return $this->redirectToRoute('index_invoice');
    }

}