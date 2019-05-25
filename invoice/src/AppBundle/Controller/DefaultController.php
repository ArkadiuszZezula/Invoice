<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Invoice;
use AppBundle\Entity\Buyer;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class DefaultController extends Controller
{
    /**
     * @Route("/", name="list")
     */
    public function indexAction(Request $request)
    {
        $invoiceRep = $this->getDoctrine()->getRepository(Invoice::class);
        $invoices = $invoiceRep->findAll();

        return $this->render('AppBundle::list.html.twig', [
            'invoices' => $invoices
            ]);
    }


    /**
     * @Route("/add/")
     */
    public function addAction(){

    }
}
