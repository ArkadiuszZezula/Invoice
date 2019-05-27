<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Invoice;
use AppBundle\Entity\InvoiceItem;
use AppBundle\Entity\Buyer;
use AppBundle\Enum\TermsPaymentEnum;
use AppBundle\Form\InvoiceType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping as ORM;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class InvoiceController extends Controller
{

    /**
     * @Route("/", name="list")
     */
    public function indexAction()
    {
        $invoiceRep = $this->getDoctrine()
            ->getRepository(Invoice::class);
        $invoices = $invoiceRep->findAll();

        return $this->render('AppBundle::list.html.twig', [
            'invoices' => $invoices,
            'termsPayment' => TermsPaymentEnum::getAllTermsPayment()
        ]);
    }

    /**
     * @Route("/add/")
     */
    public function addAction(Request $request)
    {
        $invoice = new Invoice();
        $form = $this->createForm(InvoiceType::class, $invoice);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $post = $form->getData();
            $em->persist($post);
            $em->flush();
        }

        return $this->render('AppBundle::add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/")
     */
    public function editAction(Request $request)
    {

    }

    /**
     * @Route("/delete/")
     */
    public function deleteAction(Request $request)
    {
        $id = $request->get('id');
        if ($id) {
            $invoice = $this->getDoctrine()
                ->getRepository(Invoice::class)
                ->find($id);
            $em = $this->getDoctrine()
                ->getManager();
            $em->remove($invoice);
            $em->flush();
        }
        return $this->redirect('/');
    }

}
