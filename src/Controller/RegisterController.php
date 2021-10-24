<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{

    /**
     * Class Constructor
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        
    }

    #[Route('/register', name: 'register')]
    public function index(UserPasswordHasherInterface $hasher, Request $request): Response
    {

        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);
        $notif = "re";

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $findEmail = $this->entityManager->getRepository(User::class)->findOneByEmail($user->getEmail());
            if(!$findEmail){
                $password = $hasher->hashPassword($user, $user->getPassword());
                $user->setPassword($password);

                $this->entityManager->persist($user);
                $this->entityManager->flush();
                $notif = "votre compte a été créé";
            }
            else{
                $notif = "email déjà utiliser";
            }
            
        }
        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),
            'notification' => $notif
        ]);
    }
}
