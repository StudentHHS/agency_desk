<?php
/**
 * Created by PhpStorm.
 * User: Jeroen
 * Date: 16-10-2018
 * Time: 12:29
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('_username')
            ->add('_password', PasswordType::class)
//            ->add('_token', HiddenType::class, array('csrf_token_id' => 'authenticate'))
            ;
    }

}