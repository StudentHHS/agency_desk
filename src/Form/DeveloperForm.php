<?php
/**
 * Created by PhpStorm.
 * User: Jeroen
 * Date: 28-9-2018
 * Time: 09:45
 */

namespace App\Form;

use App\Entity\User\Developer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class DeveloperForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('slug', null, array('label' => 'Slug', 'required' => false))
            ->add('firstName', null, array('label' => 'First name', 'required' => false))
            ->add('prefix',null, array('label' => 'Prefix', 'required' => false))
            ->add('lastName',null, array('label' => 'Last name', 'required' => false))
            ->add('email',null, array('label' => 'E-mail', 'required' => false))
            ->add('salt',null, array('label' => 'Salt', 'required' => false))
            ->add('password',null, array('label' => 'Password', 'required' => false))

            ->add('active',ChoiceType::class , array('label' => 'Actief', 'required' => true,
                'choices' => array( 'Yes' => 1,
                    'No' => 0)))
            ->add('save', SubmitType::class)
        ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Developer::class,
        ));
    }

}