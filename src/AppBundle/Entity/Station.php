<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Station
 *
 * @ORM\Table(name="station")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StationRepository")
 */
class Station
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
     * @var int
     *
     * @ORM\Column(name="numArret", type="integer")
     */
    private $numArret;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="klmStation", type="integer")
     */
    private $klmStation;


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
     * Set numArret
     *
     * @param integer $numArret
     *
     * @return Station
     */
    public function setNumArret($numArret)
    {
        $this->numArret = $numArret;

        return $this;
    }

    /**
     * Get numArret
     *
     * @return int
     */
    public function getNumArret()
    {
        return $this->numArret;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Station
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set klmStation
     *
     * @param integer $klmStation
     *
     * @return Station
     */
    public function setKlmStation($klmStation)
    {
        $this->klmStation = $klmStation;

        return $this;
    }

    /**
     * Get klmStation
     *
     * @return int
     */
    public function getKlmStation()
    {
        return $this->klmStation;
    }

    /**
     * @return string
     */
    public function __toString(){

        return  (string) $this->id;
    }
}

