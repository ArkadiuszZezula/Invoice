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
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Security\Acl\Exception\Exception;


class BuyerController extends Controller
{
    /**
     * @Route("/add/")
     */
    public function addAction(Request $request)
    {
        if ($this->get('Request')->isXMLHttpRequest()) {
            $buyer = new Buyer();
            $buyer->setNip($request->request->get('buyerNip'));
            $buyer->setName($request->request->get('buyerName'));

            $validator = $this->get('validator');
            $errors = $validator->validate($buyer);

            if (count($errors) > 0) {
                return new Response($errors, 400);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($buyer);
            $em->flush();

            return new JsonResponse([
                'id' => $buyer->getId(),
                'name' => $buyer->getName()],
                200
            );
        }
    }
}