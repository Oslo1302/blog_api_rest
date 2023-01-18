<?php

namespace App\Controller\Api\v1\secure;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Asset\Package;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Package("App\Controller\Api\v1\secure")]
#[Route("/api/v1/secure")]
class ArticleController extends AbstractController
{
    #[Route("articles", name: "articles")]
    public function articles():JsonResponse
    {
        return new JsonResponse([
            'articles' => [

            ]
        ]);
    }
}
