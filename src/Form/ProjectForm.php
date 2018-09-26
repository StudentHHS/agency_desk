<?php
/**
 * Created by PhpStorm.
 * User: Jeroen
 * Date: 25-9-2018
 * Time: 11:24
 */

namespace App\Form;


use App\Entity\Project\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ProjectForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array('label' => 'Titel', 'required' => false))
            ->add('body', TextareaType::class, array('label' => 'Body', 'required' => false))
            ->add('gitUrl',null, array('label' => 'Git URL', 'required' => false))
            ->add('productionUrl',null, array('label' => 'Production URL', 'required' => false))
            ->add('developmentUrl',null, array('label' => 'Development URL', 'required' => false))

            ->add('active',ChoiceType::class , array('label' => 'Actief', 'required' => true,
                'choices' => array( 1 => 'Ja',
                                    0 => 'Nee')))
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Project::class,
        ));
    }

}