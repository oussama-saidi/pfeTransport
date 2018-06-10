<?php
/**
 * Created by PhpStorm.
 * User: BEWE
 * Date: 09/06/2018
 * Time: 00:43
**/

namespace AppBundle\Form;
use AppBundle\Entity\Station;

class  ReservationIndexType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('stationsDepart',EntityType::class,array('class'=>Station::class,
                'choice_label' => 'nom',
                'attr'=>array('class'=>' form-control')))
                ->add('stationsArrive',EntityType::class,array('class'=>Station::class,
                'choice_label' => 'nom',
                'attr'=>array('class'=>' form-control')));
    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\rReservation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_reservation';
    }
}