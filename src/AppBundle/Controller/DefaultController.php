<?php

namespace AppBundle\Controller;

use Doctrine\ORM\QueryBuilder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Station;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $form = $this->createFormBuilder(null)
                ->add('stationsDepart',EntityType::class,array('label'=>'Station départ','class'=>Station::class,
                            'choice_label' => 'nom',
                            'attr'=>array('class'=>' form-control')))
                ->add('stationsArrive',EntityType::class,array('label'=>'Station arrivé','class'=>Station::class,
                            'choice_label' => 'nom',
                            'attr'=>array('class'=>' form-control')))->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            $data['stationsDepart'];

            //$entityManager = $this->getEntityManager();
            $conn = $this->getDoctrine()->getConnection();

            $sql = '
                  SELECT
                  ligne.nom,
                  ligne_station.heureDepart,
                  ligne_station.heureArrive,
                  ligne_station.tarif,
                  ligne_station.distance,
                  station.Nom AS stationDepart,
                  station_1.Nom AS stationArrive,
                  ligne_station.id
                FROM ligne_station
                  INNER JOIN ligne
                    ON ligne_station.ligne = ligne.id
                  INNER JOIN station
                    ON station.id = ligne_station.stationDepart
                  INNER JOIN station station_1
                    ON station_1.id = ligne_station.stationArrive
                WHERE ligne_station.stationDepart = :stationDepart
                AND ligne_station.stationArrive = :stationArrive';
                $stmt = $conn->prepare($sql);
            $stmt->execute(array('stationDepart'=>$data['stationsDepart'],'stationArrive'=>$data['stationsArrive']));
            // returns an array of arrays (i.e. a raw data set)
            $results = $stmt->fetchAll();
            return $this->render('default/resultat.html.twig',array(
                'resultats' => $results));

        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView()
        ));

    }
}
