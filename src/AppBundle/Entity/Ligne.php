<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ligne
 *
 * @ORM\Table(name="ligne")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LigneRepository")
 */
class Ligne
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="nbreStation", type="string", length=255)
     */
    private $nbreStation;

    /**
     * @var string
     *
     * @ORM\Column(name="longuer", type="decimal", precision=10, scale=0)
     */
    private $longuer;


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
     * Set nbreStation
     *
     * @param string $nbreStation
     *
     * @return Ligne
     */
    public function setNbreStation($nbreStation)
    {
        $this->nbreStation = $nbreStation;

        return $this;
    }

    /**
     * Get nbreStation
     *
     * @return string
     */
    public function getNbreStation()
    {
        return $this->nbreStation;
    }

    /**
     * Set longuer
     *
     * @param string $longuer
     *
     * @return Ligne
     */
    public function setLonguer($longuer)
    {
        $this->longuer = $longuer;

        return $this;
    }

    /**
     * Get longuer
     *
     * @return string
     */
    public function getLonguer()
    {
        return $this->longuer;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function __toString(){

        return  (string) $this->id;
    }
}

