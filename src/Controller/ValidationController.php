<?php

namespace App\Controller;

use App\Entity\BlogPost;
use http\Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ValidationController extends AbstractController
{
    #[Route("/validation")]
    public function validation(ValidatorInterface $validator): JsonResponse
    {
        $blogPost = new BlogPost();
        $blogPost->setApprovalDate('2020-05-16');

        $errors = $validator->validate($blogPost);

        $return = [];

        foreach ($errors as $error) {
            $return[] = ((string) $error);
        }

        return new JsonResponse($return);
    }
}