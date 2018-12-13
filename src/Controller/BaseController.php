<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class BaseController extends Controller
{
    /**
     * @Route("/", name="index_base")
     */
    public function index(Request $request  )
    {
        
        //Redirection Si Role_Admin ou ROLE_User
        $authChecker=$this->container->get('security.authorization_checker');

        if ($authChecker->isGranted('ROLE_ADMIN')) {
           return $this->redirectToRoute('easyadmin');
        }else{
            return $this->render('base.html.twig');
        }
                 return $this->render('base.html.twig');

    }

}
