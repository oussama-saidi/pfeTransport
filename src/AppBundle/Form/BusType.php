<?php

namespace AppBundle\Form;


use AppBundle\Entity\Conducteur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BusType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('depart',TextType::class,array('attr'=>array('class'=>' form-control')))
                ->add('destination',TextType::class,array('attr'=>array('class'=>' form-control')))
                ->add('nombrePlaces',IntegerType::class,array('attr'=>array('class'=>' form-control')))
                ->add('conducteur',EntityType::class,array('class'=>Conducteur::class,
                    'choice_label' => 'prenom'.' '. 'nom',
                    'attr'=>array('class'=>' form-control')));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Bus'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_bus';
    }


}
