<?php
/**
 * Created by PhpStorm.
 * User: Jeroen
 * Date: 28-9-2018
 * Time: 11:42
 */

namespace App\Form;

use App\Entity\Financial\Invoice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class InvoiceForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('invoiceNr', null, array('label' => 'Factuurnummer', 'required' => false))
            ->add('credit',ChoiceType::class , array('label' => 'Creditfactuur', 'required' => true,
                'choices' => array( 'Yes' => 1,
                    'No' => 0)))
            ->add('paid',ChoiceType::class , array('label' => 'Betaald', 'required' => true,
                'choices' => array( 'Yes' => 1,
                                    'No' => 0)))

            ->add('paymentDate', DateType::class)

            ->add('reasonFree',TextareaType::class, array('label' => 'Reden vrij', 'required' => false))
            ->add('date', DateType::class)
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Invoice::class,
        ));
    }

}