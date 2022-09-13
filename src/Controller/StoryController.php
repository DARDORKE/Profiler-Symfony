<?php

namespace App\Controller;

use App\Entity\Story;
use App\Form\StoryType;
use App\Repository\StoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/story")
 */
class StoryController extends AbstractController
{
    /**
     * @Route("/new", name="story_new", methods={"GET","POST"})
     */
    public function new(Request $request, ValidatorInterface $validator): Response
    {
        $story = new Story();

        $form = $this->createForm(StoryType::class, $story);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render('story/show.html.twig', [
                'story' => $story,
            ]);
        }

        return $this->render('story/new.html.twig', [
            'story' => $story,
            'form' => $form->createView(),
        ]);
    }
}