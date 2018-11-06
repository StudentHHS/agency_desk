<?php
/**
 * Created by PhpStorm.
 * User: Jeroen
 * Date: 24-10-2018
 * Time: 16:37
 */

namespace App\Form;


use App\Entity\Financial\CreditCard;
use App\Entity\Financial\Invoice;
use App\Entity\Project\ActualWork;
use App\Entity\Project\Task;
use App\Entity\User\Developer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActualWorkForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('developer', EntityType::class, array('label' => 'Developer', 'class' => Developer::class, 'required' => true))
            ->add('creditCard', EntityType::class, array('label' => 'Credit card', 'class' => CreditCard::class, 'required' => true))
            ->add('invoice', EntityType::class, array('label' => 'Factuur', 'class' => Invoice::class, 'required' => true))
            ->add('task', EntityType::class, array('label' => 'Taak', 'class' => Task::class,  'required' => true))
            ->add('begin', DateTimeType::class, array('label' => 'Begin', 'widget' => 'single_text', 'required' => true, 'attr' => ['class' => 'js-datepicker']))
            ->add('end', DateTimeType::class, array('label' => 'Eind', 'widget' => 'single_text', 'required' => true, 'attr' => ['class' => 'js-datepicker']))
            ->add('timePast', IntegerType::class, array('label' => 'Verstreken tijd (in minuten)', 'required' => true))

            ->add('save', SubmitType::class)
            ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => ActualWork::class,
        ));
    }


}