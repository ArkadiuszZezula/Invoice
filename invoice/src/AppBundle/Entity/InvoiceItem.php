<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceItem
 *
 * @ORM\Table(name="invoice_item", uniqueConstraints={@ORM\UniqueConstraint(name="invoice_item_id_uindex", columns={"id"})})
 * @ORM\Entity
 */
class InvoiceItem
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
     * @var integer
     *
     * @ORM\Column(name="id_invoice", type="bigint", nullable=false)
     */
    private $idInvoice;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text", length=65535, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="quantity", type="text", length=65535, nullable=false)
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="unit", type="text", length=65535, nullable=false)
     */
    private $unit;

    /**
     * @var string
     *
     * @ORM\Column(name="net_unit_price", type="text", length=65535, nullable=false)
     */
    private $netUnitPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="net_price", type="text", length=65535, nullable=false)
     */
    private $netPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="vat", type="text", length=65535, nullable=false)
     */
    private $vat;

    /**
     * @var integer
     *
     * @ORM\Column(name="gross_price", type="integer", nullable=false)
     */
    private $grossPrice;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Invoice", inversedBy="items")
     * @ORM\JoinColumn(name="id_invoice", referencedColumnName="id")
     */
    private $invoice;

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
     * @return int
     */
    public function getIdInvoice()
    {
        return $this->idInvoice;
    }

    /**
     * @param int $idInvoice
     */
    public function setIdInvoice($idInvoice)
    {
        $this->idInvoice = $idInvoice;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param string $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param string $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
    }

    /**
     * @return string
     */
    public function getNetUnitPrice()
    {
        return $this->netUnitPrice;
    }

    /**
     * @param string $netUnitPrice
     */
    public function setNetUnitPrice($netUnitPrice)
    {
        $this->netUnitPrice = $netUnitPrice;
    }

    /**
     * @return string
     */
    public function getNetPrice()
    {
        return $this->netPrice;
    }

    /**
     * @param string $netPrice
     */
    public function setNetPrice($netPrice)
    {
        $this->netPrice = $netPrice;
    }

    /**
     * @return string
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @param string $vat
     */
    public function setVat($vat)
    {
        $this->vat = $vat;
    }

    /**
     * @return int
     */
    public function getGrossPrice()
    {
        return $this->grossPrice;
    }

    /**
     * @param int $grossPrice
     */
    public function setGrossPrice($grossPrice)
    {
        $this->grossPrice = $grossPrice;
    }



}

