<?php

namespace App\Controller\Api\v1;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route("/auth/login", name: "login", methods: ["POST", "HEAD"])]
    public function login():JsonResponse
    {
        return new JsonResponse(data: 'login');
    }

    #[Route("/signup/register", name: "signup", methods: ["POST", "HEAD"])]
    public function register():JsonResponse
    {
        return new JsonResponse(data: 'register');
    }
}
