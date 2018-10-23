<?php
/**
 * Created by PhpStorm.
 * User: Jeroen
 * Date: 16-10-2018
 * Time: 12:26
 */

namespace App\Controller;


use App\Form\LoginForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class LoginController extends Controller
{

    /**
     *@Route("/login", name="login_page")
     *@Template()
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->createForm(LoginForm::class, [
            '_username' => $lastUsername
        ]);


        return [
            'form' => $form->createView(),
            'error'         => $error,
        ];

//        $authenticationUtils = $this->get('login.authentication_utils');
//
//        // get the login error if there is one
//        $error = $authenticationUtils->getLastAuthenticationError();
//
//        // last username entered by the user
//        $lastUsername = $authenticationUtils->getLastUsername();
//
//        $form = $this->createForm(LoginForm::class, [
//            '_username' => $lastUsername
//        ]);
//
//        return $this->render('login/login.html.twig',[
//            'form'          => $form->createView(),
//            'error'         => $error,
//        ]);

    }

    /**
     * @Route("/logout", name="logout_page")
     */
    public function logout()
    {

        throw new \Exception('Intercepted');

    }

}