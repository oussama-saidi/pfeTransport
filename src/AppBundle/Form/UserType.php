<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $permissions = array(
            'Utilisateur'        => 'ROLE_USER',
            'Administrateur'     => 'ROLE_ADMIN'
        );

        $builder->add('nom', null, array('label' => 'Nom', 'translation_domain' => 'FOSUserBundle','attr'=>array('class'=>' form-control')))
            ->add('prenom', null, array('label' => 'Prénoms', 'translation_domain' => 'FOSUserBundle','attr'=>array('class'=>' form-control')))
            ->add('email', EmailType::class, array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle','attr'=>array('class'=>' form-control')))
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle','attr'=>array('class'=>' form-control')))
            ->add('cin', IntegerType::class, array('label' => 'form.cin', 'translation_domain' => 'FOSUserBundle','attr'=>array('class'=>' form-control')))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'options' => array(
                    'translation_domain' => 'FOSUserBundle',
                    'attr' => array(
                        'autocomplete' => 'new-password',
                    ),
                ),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
                'attr'=>array('class'=>' form-control')
            ))
            ->add('roles', ChoiceType::class, array(
                'choices' => array('ROLE_USER' => 'User', 'ROLE_ADMIN' => 'Administrator'),
                'multiple' => true,
                'attr'=>array('class'=>' form-control')
            ));;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }


}
