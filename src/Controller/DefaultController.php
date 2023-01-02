<?php

    namespace App\Controller;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

   class DefaultController extends AbstractController
   {
    #[Route("/home", name:"home")]
    public function home():JsonResponse
    {
        return new JsonResponse(data : "Ma route pour mon api rest");
    }

    #[Route("/documents", name: "documents")]
    public function apiDoc():JsonResponse
    {
        return new JsonResponse(
            [
                "title" => "Mon api rest",
                "subtitle" => [
                    "description" => "un simple petit blog",
                    "url" => "elle sera bientot dispo",
                    "goulam" => "pour toujours"
                ]
            ]
            );
    }
   }