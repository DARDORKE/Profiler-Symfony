<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class BlogPost
{
    public const LANGUAGE = ['PHP', 'HTML', 'JS'];

    #[Assert\Length(min: 15)]
    private $title;

    #[Assert\NotBlank]
    private $slug;

    #[Assert\NotBlank]
    #[Assert\Length(max: 2000)]
    private $abstract;

    #[Assert\NotBlank]
    #[Assert\Email(mode: 'html5')]
    private $author;

    #[Assert\Length(min: 100, max: 10000)]
    private $content;

    #[Assert\NotBlank]
    #[Assert\Choice(choices: self::LANGUAGE)]
    private $category;
}