<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\Pizza;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @ORM\OneToOne(targetEntity="User", cascade={"persist"}) 
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Pizza")
     * @ORM\JoinColumn(name="pizza_id", referencedColumnName="id")
     */
    private $pizza;

    /** 
     * @var datetime $created
     * @ORM\Column(name="date", type="datetime")
     * 
     */
    private $created;

    /** 
     * @var int $statut
     * @ORM\Column(name="statut", type="integer")
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
    public function setStatut($val)
    {
        $this->statut = $val;
    }

    /**
     * Set user.
     * 
     */
    public function setUser(User $luser){
        $this->user = $luser;
    }

    /**
     * Get user.
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get pizza.
     *
     * @return Pizza
     */
    public function getPizza()
    {
        return $this->pizza;
    }

    /**
     * Set pizza.
     */
    public function setPizza(Pizza $pizz)
    {
        $this->pizza = $pizz;
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
