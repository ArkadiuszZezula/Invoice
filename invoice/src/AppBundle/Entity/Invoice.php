<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Invoice
 *
 * @ORM\Table(name="invoice", uniqueConstraints={@ORM\UniqueConstraint(name="invoice_id_uindex", columns={"id"})})
 * @ORM\Entity
 */
class Invoice
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nr", type="text", length=65535, nullable=true)
     * @Assert\NotBlank()
     */
    private $nr;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_buyer", type="integer", nullable=true)
    //     * @Assert\NotBlank()
     */
    private $idBuyer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     * @Assert\NotBlank()
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="sale_date", type="datetime", nullable=false)
     * @Assert\NotBlank()
     */
    private $saleDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="payment_deadline", type="datetime", nullable=true)
     * @Assert\NotBlank()
     */
    private $paymentDeadline;

    /**
     * @var integer
     *
     * @ORM\Column(name="terms_payment", type="integer", nullable=false)
     * @Assert\NotBlank()
     */
    private $termsPayment;

    /**
     * @var string
     *
     * @ORM\Column(name="bank_account", type="text", length=65535, nullable=true)
     * @Assert\NotBlank()
     */
    private $bankAccount;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\InvoiceItem", mappedBy="invoices", cascade={"persist"})
     */
    private $items;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Buyer", cascade={"persist"})
     * @ORM\JoinColumn(name="id_buyer", referencedColumnName="id")
     */
    private $buyer;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNr()
    {
        return $this->nr;
    }

    /**
     * @param string $nr
     */
    public function setNr($nr)
    {
        $this->nr = $nr;
    }

    /**
     * @return int
     */
    public function getIdBuyer()
    {
        return $this->idBuyer;
    }

    /**
     * @param int $idBuyer
     */
    public function setIdBuyer($idBuyer)
    {
        $this->idBuyer = $idBuyer;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getSaleDate()
    {
        return $this->saleDate;
    }

    /**
     * @param \DateTime $saleDate
     */
    public function setSaleDate($saleDate)
    {
        $this->saleDate = $saleDate;
    }

    /**
     * @return \DateTime
     */
    public function getPaymentDeadline()
    {
        return $this->paymentDeadline;
    }

    /**
     * @param \DateTime $paymentDeadline
     */
    public function setPaymentDeadline($paymentDeadline)
    {
        $this->paymentDeadline = $paymentDeadline;
    }

    /**
     * @return int
     */
    public function getTermsPayment()
    {
        return $this->termsPayment;
    }

    /**
     * @param int $termsPayment
     */
    public function setTermsPayment($termsPayment)
    {
        $this->termsPayment = $termsPayment;
    }

    /**
     * @return string
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * @param string $bankAccount
     */
    public function setBankAccount($bankAccount)
    {
        $this->bankAccount = $bankAccount;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param mixed $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @param $items
     */
    public function addItems(InvoiceItem $items)
    {
        $this->items[] = $items;
    }

    /**
     * @return mixed
     */
    public function getBuyer()
    {
        return $this->buyer;
    }

    /**
     * @param mixed $buyer
     */
    public function setBuyer($buyer)
    {
        $this->buyer = $buyer;
    }

}

