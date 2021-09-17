<?php

namespace App\Controller;

use App\Entity\Ingredient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Recip;
use Symfony\Component\HttpFoundation\Response;
use App\Form\AddIngredientType;
use Symfony\Component\HttpFoundation\Request;
use App\Form\AddRecipType;
use Symfony\Component\Routing\Annotation\Route;

class RecipiceController extends AbstractController
{

    /**
     * Class Constructor
     */
    public function __construct()
    {
        
    }

    #[Route('/recipAdd', name: 'recipAdd')]
    public function index(Request $request): Response
    {
        $ingredient = new Ingredient();
        $recip = new Recip();
        
        $form = $this->createForm(AddRecipType::class, $recip);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dd($form, $recip);
        }

        return $this->render('recipice/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
