<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LigneStation
 *
 * @ORM\Table(name="ligne_station")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LigneStationRepository")
 */
class LigneStation
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
     * @ORM\Column(name="ligne", type="integer")
     */
    private $ligne;

    /**
     * @var int
     *
     * @ORM\Column(name="stationDepart", type="integer")
     */
    private $stationDepart;

    /**
     * @var int
     *
     * @ORM\Column(name="stationArrive", type="integer")
     */
    private $stationArrive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureDepart", type="time")
     */
    private $heureDepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureArrive", type="time")
     */
    private $heureArrive;

    /**
     * @var string
     *
     * @ORM\Column(name="tarif", type="decimal", precision=10, scale=0)
     */
    private $tarif;

    /**
     * @var int
     *
     * @ORM\Column(name="distance", type="integer")
     */
    private $distance;


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
     * Set stationDepart
     *
     * @param integer $stationDepart
     *
     * @return LigneStation
     */
    public function setStationDepart($stationDepart)
    {
        $this->stationDepart = $stationDepart;

        return $this;
    }

    /**
     * Get stationDepart
     *
     * @return int
     */
    public function getStationDepart()
    {
        return $this->stationDepart;
    }

    /**
     * Set stationArrive
     *
     * @param integer $stationArrive
     *
     * @return LigneStation
     */
    public function setStationArrive($stationArrive)
    {
        $this->stationArrive = $stationArrive;

        return $this;
    }

    /**
     * Get stationArrive
     *
     * @return int
     */
    public function getStationArrive()
    {
        return $this->stationArrive;
    }

    /**
     * Set heureDepart
     *
     * @param \DateTime $heureDepart
     *
     * @return LigneStation
     */
    public function setHeureDepart($heureDepart)
    {
        $this->heureDepart = $heureDepart;

        return $this;
    }

    /**
     * Get heureDepart
     *
     * @return \DateTime
     */
    public function getHeureDepart()
    {
        return $this->heureDepart;
    }

    /**
     * Set heureArrive
     *
     * @param \DateTime $heureArrive
     *
     * @return LigneStation
     */
    public function setHeureArrive($heureArrive)
    {
        $this->heureArrive = $heureArrive;

        return $this;
    }

    /**
     * Get heureArrive
     *
     * @return \DateTime
     */
    public function getHeureArrive()
    {
        return $this->heureArrive;
    }

    /**
     * Set tarif
     *
     * @param string $tarif
     *
     * @return LigneStation
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;

        return $this;
    }

    /**
     * Get tarif
     *
     * @return string
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * Set distance
     *
     * @param integer $distance
     *
     * @return LigneStation
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance
     *
     * @return int
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @return int
     */
    public function getLigne()
    {
        return $this->ligne;
    }

    /**
     * @param int $ligne
     */
    public function setLigne($ligne)
    {
        $this->ligne = $ligne;
    }


}

