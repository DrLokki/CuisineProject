<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $imageList = [
            'test1' => "https://source.unsplash.com/1700x1000/?nature",
            'test2' => "https://source.unsplash.com/1700x1000/?nature,water",
            'test3' => "https://source.unsplash.com/1700x1000/?nature,rock",
        ];

        return $this->render('home/index.html.twig', [
            'imageList' => $imageList,
        ]);
    }
}
