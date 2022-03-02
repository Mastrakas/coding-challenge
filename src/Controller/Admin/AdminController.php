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
     * @Route("/choice", name="choice")
     */

     public function choice (TechRepository $techRepository, Request $request){

        $tech1 = $techRepository->findAll();
        $tech2 = $techRepository->findAll();

        return $this->render('choice.html.twig',
        [
            'tech1'=>$tech1,
            'tech2'=>$tech2,
        ]);
     }

     /**
      * @Route("/myJSON", name="myJSON")
      */

      public function myJSON (TechRepository $techRepository, Request $request){
        
        $tech1 = $_GET["tech1"];
        $tech2 = $_GET["tech2"];
        
        $equivalent1 = $techRepository->findBy(
            ['name' => $tech1]
        );
        $equivalent2 = $techRepository->findBy(
            ['name' => $tech2]
        );

        $ninjaName = $equivalent1['0']->getNinjaName()." ".$equivalent2['0']->getNinjaName();
        
        $lines = [];
        $header = [
            "Ninja Name"
        ];
        $lines[] = $header;
        $lines[] = $ninjaName;

        $filedata = json_encode($lines);
        $filename = "myJSON.json";

        $response = new Response();
        $response->headers->set('Cache-Control', 'private');
        $response->headers->set('Content-Disposition', 'attachment; filename="' .basename($filename). '";');
        $response->setContent($filedata);
        return $response;
      }
}