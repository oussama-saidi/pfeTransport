<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conducteur
 *
 * @ORM\Table(name="conducteur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ConducteurRepository")
 */
class Conducteur
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
     * @ORM\Column(name="numMatricule", type="integer", unique=true)
     */
    private $numMatricule;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="numerosTel", type="string", length=255)
     */
    private $numerosTel;


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
     * Set numMatricule
     *
     * @param integer $numMatricule
     *
     * @return Conducteur
     */
    public function setNumMatricule($numMatricule)
    {
        $this->numMatricule = $numMatricule;

        return $this;
    }

    /**
     * Get numMatricule
     *
     * @return int
     */
    public function getNumMatricule()
    {
        return $this->numMatricule;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Conducteur
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Conducteur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set numerosTel
     *
     * @param string $numerosTel
     *
     * @return Conducteur
     */
    public function setNumerosTel($numerosTel)
    {
        $this->numerosTel = $numerosTel;

        return $this;
    }

    /**
     * Get numerosTel
     *
     * @return string
     */
    public function getNumerosTel()
    {
        return $this->numerosTel;
    }
public function getPrenomNom()
{
    return $this->prenom.' '.$this->nom;
}
    /**
     * @return string
     */
    public function __toString(){

        return  (string) $this->id;
    }
}

