<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ValidationController extends AbstractController
{
    #[Route("/validation")]
    public function validation(ValidatorInterface $validator): Response
    {
        $user = new User();
        $user->setUsername('johndoe');
        $user->setFirstName('John');
        $user->setLastName('Doe');

        $errors = $validator->validate($user);


        return $this->render('validation/index.html.twig', [
            'errors' => $errors
        ]);
    }
}