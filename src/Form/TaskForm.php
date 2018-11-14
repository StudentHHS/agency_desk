<?php
/**
 * Created by PhpStorm.
 * User: Jeroen
 * Date: 14-11-2018
 * Time: 15:02
 */

namespace App\Form;


use App\Entity\Project\Task;
use App\Entity\Project\Project;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('project', EntityType::class, array('label' => 'Project', 'class' => Project::class, 'choices' => $options['title'], 'required' => true))
            ->add('priority', IntegerType::class, array('label' => 'Prioriteit', 'required' => true))
            ->add('title', null, array('label' => 'Titel', 'required' => true))
            ->add('body', TextareaType::class, array('label' => 'Body', 'required' => true))
            ->add('estimated_time', IntegerType::class, array('label' => 'Verstreken tijd (in minuten)', 'required' => true))
            ->add('approved', ChoiceType::class, array('label' => 'Goedgekeurd', 'required' => true,
                'choices' => array( 'Yes' => 1,
                                    'No' => 0)))
            ->add('approved_date', DateType::class, array('label' => 'Datum goedgekeurd', 'required' => true, 'widget' => 'single_text'))
            ->add('finished_date', DateType::class, array('label' => 'Datum afgerond', 'required' => true, 'widget' => 'single_text'))

            ->add('save', SubmitType::class)
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Task::class,
        ));
    }


}