<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Buyer
 *
 * @ORM\Table(name="buyer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BuyerRepository")
 */
class Buyer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank(message="Field name should not be blank")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="nip", type="string", length=255)
     * @Assert\Type(type="numeric", message="Field nip should be type numeric")
     * @Assert\Length(min="10", max="10",
     *      maxMessage="Field nip should have exactly 10 character",
     *      minMessage="Field nip should have exactly 10 character")
     * @Assert\NotBlank()
     */
    private $nip;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Buyer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set nip
     *
     * @param string $nip
     *
     * @return Buyer
     */
    public function setNip($nip)
    {
        $this->nip = $nip;

        return $this;
    }

    /**
     * Get nip
     *
     * @return string
     */
    public function getNip()
    {
        return $this->nip;
    }
}

