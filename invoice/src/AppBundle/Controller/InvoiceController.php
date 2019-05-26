<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Invoice;
use AppBundle\Entity\InvoiceItem;
use AppBundle\Entity\Buyer;
use AppBundle\Enum\TermsPaymentEnum;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class InvoiceController extends Controller
{


    /**
     * @Route("/", name="list")
     */
    public function indexAction(Request $request)
    {
        $invoiceRep = $this->getDoctrine()
            ->getRepository(Invoice::class);
        $invoices = $invoiceRep->findAll();
//        var_dump($invoices[0]);
//        var_dump($a>getName());


        return $this->render('AppBundle::list.html.twig', [
            'invoices' => $invoices,
            'termsPayment' => TermsPaymentEnum::getAllTermsPayment()
            ]);
    }


    /**
     * @Route("/add/")
     */
    public function addAction(){

    }

    /**
     * @Route("/add/")
     */
    public function editAction(){

    }

    /**
     * @Route("/add/")
     */
    public function deleteAction(){

    }
}