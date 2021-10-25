<?php

namespace App\Controller;

use App\Entity\Ingredient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Recip;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Form\AddIngredientType;
use Symfony\Component\HttpFoundation\Request;
use App\Form\AddRecipType;
use Symfony\Component\Routing\Annotation\Route;

class RecipiceController extends AbstractController
{

    private $entityManager;

    /**
     * Class Constructor
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        
    }

    #[Route('/recipAdd', name: 'recipAdd')]
    public function index(Request $request): Response
    {
        $ingredient = new Ingredient();
        $recip = new Recip();
        
        $form = $this->createForm(AddRecipType::class, $recip);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            foreach ($recip->getIngredient() as $value) {
                $this->entityManager->persist($value);
            }
            $this->entityManager->persist($recip);
            $this->entityManager->flush();
        }

        return $this->render('recipice/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
