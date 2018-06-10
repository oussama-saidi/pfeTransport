<?php
/**
 * Created by PhpStorm.
 * User: BEWE
 * Date: 02/06/2018
 * Time: 18:33
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="resaervation")
 */
class Reservation
{
    /**
 * @ORM\Id
 * @ORM\Column(type="integer")
 * @ORM\GeneratedValue(strategy="AUTO")
 */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idVoaygeur;
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $stationArrivee;
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $stationDepart;
    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private $HeureDepart;
    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private $HeureArrive;
    /**
     * @var DateTime
     * @ORM\Column(type="decimal")
     */
    private $kml;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdVoaygeur()
    {
        return $this->idVoaygeur;
    }

    /**
     * @param mixed $idVoaygeur
     */
    public function setIdVoaygeur($idVoaygeur)
    {
        $this->idVoaygeur = $idVoaygeur;
    }

    /**
     * @return string
     */
    public function getStationArrivee()
    {
        return $this->stationArrivee;
    }

    /**
     * @param string $stationArrivee
     */
    public function setStationArrivee($stationArrivee)
    {
        $this->stationArrivee = $stationArrivee;
    }

    /**
     * @return string
     */
    public function getStationDepart()
    {
        return $this->stationDepart;
    }

    /**
     * @param string $stationDepart
     */
    public function setStationDepart($stationDepart)
    {
        $this->stationDepart = $stationDepart;
    }

    /**
     * @return DateTime
     */
    public function getHeureDepart()
    {
        return $this->HeureDepart;
    }

    /**
     * @param DateTime $HeureDepart
     */
    public function setHeureDepart($HeureDepart)
    {
        $this->HeureDepart = $HeureDepart;
    }

    /**
     * @return DateTime
     */
    public function getHeureArrive()
    {
        return $this->HeureArrive;
    }

    /**
     * @param DateTime $HeureArrive
     */
    public function setHeureArrive($HeureArrive)
    {
        $this->HeureArrive = $HeureArrive;
    }

    /**
     * @return DateTime
     */
    public function getKml()
    {
        return $this->kml;
    }

    /**
     * @param DateTime $kml
     */
    public function setKml($kml)
    {
        $this->kml = $kml;
    }


}