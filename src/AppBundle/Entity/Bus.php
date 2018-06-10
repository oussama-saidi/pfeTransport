<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bus
 *
 * @ORM\Table(name="bus")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BusRepository")
 */
class Bus
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
     *@ORM\Column(type="string")
     */
    private $numSerie;

    /**
     * @var string
     *
     * @ORM\Column(name="depart", type="string", length=100)
     */
    private $depart;

    /**
     * @var string
     *
     * @ORM\Column(name="destination", type="string", length=100)
     */
    private $destination;

    /**
     * @var int
     *
     * @ORM\Column(name="nombrePlaces", type="integer")
     */
    private $nombrePlaces;

    /**
     * @var int
     * @ORM\OneToOne(targetEntity="Conducteur")
     * @ORM\JoinColumn(name="conducteur", referencedColumnName="id")
     * @ORM\Column(name="conducteur", type="integer" ,nullable=false)
     */
    private $conducteur;

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
     * @return string
     */
    public function getNumSerie()
    {
        return $this->numSerie;
    }

    /**
     * Set depart
     *
     * @param string $depart
     *
     * @return Bus
     */
    public function setDepart($depart)
    {
        $this->depart = $depart;

        return $this;
    }

    /**
     * Get depart
     *
     * @return string
     */
    public function getDepart()
    {
        return $this->depart;
    }

    /**
     * @return int
     */
    public function getConducteur()
    {
        return $this->conducteur;
    }

    /**
     * @param int $conducteur
     */
    public function setConducteur($conducteur)
    {
        $this->conducteur = $conducteur;
    }



    /**
     * Set destination
     *
     * @param string $destination
     *
     * @return Bus
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set nombrePlaces
     *
     * @param integer $nombrePlaces
     *
     * @return Bus
     */
    public function setNombrePlaces($nombrePlaces)
    {
        $this->nombrePlaces = $nombrePlaces;

        return $this;
    }

    /**
     * Get nombrePlaces
     *
     * @return int
     */
    public function getNombrePlaces()
    {
        return $this->nombrePlaces;
    }

}
