<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Pizza
 *
 * @ORM\Table(name="pizza")
 * @ORM\Entity(repositoryClass="App\Repository\PizzaRepository")
 */
class Pizza
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
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /** 
     * @ORM\ManyToMany(targetEntity="Ingredient", inversedBy="pizzas")
     */
    private $ingredients;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    public function __construct()
    {
        $this->ingredients = new ArrayCollection();
    }

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
     * Set name.
     *
     * @param string $name
     *
     * @return Pizza
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Pizza
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price.
     *
     * @param float $price
     *
     * @return Pizza
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price.
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get ingredients
     * 
     * @return ingredients
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Add ingredients
     * 
     * @return ingredients
     */
    public function addIngredient(Ingredient $ingredient)
    {
        $this->ingredients[] = $ingredient;

        return $this;
    }

    /**
     * Remove ingredient
     */
    public function removeIngredient(Ingredient $ingredient)
    {
        $this->ingredients->removeElement($ingredient);
    }

    /**
     * ToString 
     * 
     * @return name
     */
    public function __toString(){

        return $this->getName() . " (" . $this->getPrice() . ") ";
    }
}
