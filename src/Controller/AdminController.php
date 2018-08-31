<?php
/**
 * Created by PhpStorm.
 * User: Jeroen
 * Date: 31-8-2018
 * Time: 11:07
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class AdminController extends AbstractController
{

    /**
     * @Route("/admin")
     */
    public function index()
    {
        return $this->render('admin/admin.html.twig');
    }


}