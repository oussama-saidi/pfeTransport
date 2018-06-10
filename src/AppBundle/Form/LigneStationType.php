<?php

namespace AppBundle\Form;

use AppBundle\Entity\Ligne;
use AppBundle\Entity\Station;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LigneStationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('Ligne',EntityType::class,
                                            array('class'=>Ligne::class,
                                                'choice_label' => 'nom',
                                                'label'=>'Station départ','attr'=>array('class'=>' form-control')))
                ->add('stationDepart',EntityType::class,
                    array('class'=>Station::class,
                        'choice_label' => 'nom',
                        'label'=>'Station départ','attr'=>array('class'=>' form-control')))
                ->add('stationArrive',EntityType::class,
                                             array('class'=>Station::class,
                                                 'choice_label' => 'nom',
                                                 'label'=>'Station arrivé','attr'=>array('class'=>' form-control')))
                ->add('heureDepart',TimeType::class,array('label'=>'Heure départ',
                                        'attr'=>array('class'=>' form-control')))
                ->add('heureArrive',TimeType::class,array('label'=>'Heure arrivé',
                                        'attr'=>array('class'=>' form-control')))
                ->add('tarif',TextType::class,array('label'=>'Tarif',
                    'attr'=>array('class'=>' form-control')))
                ->add('distance',IntegerType::class,array('label'=>'Distance',
                    'attr'=>array('class'=>' form-control')));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\LigneStation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_lignestation';
    }


}
