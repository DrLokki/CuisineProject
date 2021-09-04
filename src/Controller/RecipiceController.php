<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecipiceController extends AbstractController
{
    #[Route('/recipice', name: 'recipice')]
    public function index(): Response
    {
        return $this->render('recipice/index.html.twig', [
            'controller_name' => 'RecipiceController',
        ]);
    }
}
