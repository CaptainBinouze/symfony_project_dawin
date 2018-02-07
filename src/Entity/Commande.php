<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 */
class Commande
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
     * @var string $telephone
     *
     * @ORM\Column(name="telephone", type="string")
     */
    private $telephone;

    /** 
     * @ORM\Column(name="id_user")
     * @ORM\OneToOne(targetEntity="User") 
     * 
     */
    private $user;

    /** 
     * @ORM\Column(name="id_pizza")
     * @ORM\OneToOne(targetEntity="Pizza") 
     * 
     */
    private $pizza;

    /** 
     * @var datetime $created
     * @ORM\Column(name="date", type="datetime")
     * 
     */
    private $created;

    /** 
     * @var boolean $statut
     * @ORM\Column(name="statut", type="boolean")
     * 
     */
    private $statut;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get telephone.
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set telephone.
     */
    public function setTelephone(string $tel)
    {
        $this->telephone = $tel;
    }

    /**
     * Get statut.
     *
     * @return boolean
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set statut.
     */
    public function setStatut(boolean $val)
    {
        $this->statut = $val;
    }
    /**
     * Get user.
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get pizza.
     *
     * @return string
     */
    public function getPizza()
    {
        return $this->pizza;
    }

    /**
     * Gets triggered only on insert
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->created = new \DateTime("now");
    }
}
