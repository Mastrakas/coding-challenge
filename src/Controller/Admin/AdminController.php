<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TechRepository;
use Symfony\Component\Security\Core\User\UserInterface;

class AdminController extends AbstractController{

    /**
     * @Route("/admin/home", name="admin_home")
     */

     public function adminHome (TechRepository $techRepository){

        $tech1 = $techRepository->findAll();

        $tech2 = $techRepository->findAll();

        return $this->render('adminhome.html.twig',
        [
            'tech1'=>$tech1,
            'tech2'=>$tech2
        ]);
     }
}