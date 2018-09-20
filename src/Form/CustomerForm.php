<?php
/**
 * Created by PhpStorm.
 * User: Jeroen
 * Date: 20-9-2018
 * Time: 14:12
 */

namespace App\Form;


use App\Entity\User\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CustomerForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array('label' => 'Titel', 'required' => false))
            ->add('street',null, array('label' => 'Straat', 'required' => false))
            ->add('taxnumber',null, array('label' => 'Tax nummer', 'required' => false))
            ->add('kvkNumber',null, array('label' => 'Kvk nummer', 'required' => false))
            ->add('phone',null, array('label' => 'Telefoonnummer', 'required' => false))
            ->add('fax',null, array('label' => 'Fax nummer', 'required' => false))
            ->add('company_name',null, array('label' => 'Bedrijfsnaam', 'required' => false))
            ->add('old_id',null, array('label' => 'Oud id', 'required' => false))
            ->add('vatNumber',null, array('label' => 'Vat nummer', 'required' => false))
            ->add('active',ChoiceType::class, array('label' => 'Actief', 'required' => true,
                'choices' => array( 1 => 'Ja',
                                    0 => 'Nee')))
            ->add('hourly_rate',null, array('label' => 'Uurtarief', 'required' => false))
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Customer::class,
        ));
    }




}