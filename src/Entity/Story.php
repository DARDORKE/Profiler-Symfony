<?php

namespace App\Entity;

use App\Validator\IsFibonacci;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: "App\Repository\StoryRepository")]
class Story
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id;


    #[Assert\Length(min: 10)]
    #[ORM\Column(type: "string", length: 255)]
    private ?string $name;

    #[Assert\Length(max: 2000)]
    #[ORM\Column(type: "text", nullable: true)]
    private ?string $description;

    #[IsFibonacci]
    #[ORM\Column(type: "integer")]
    private ?int $storyPoints;


    #[Assert\Regex("/^[A-Za-z0-9]+$/")]
    #[ORM\Column(type: "string", length: 255)]
    private ?string $author;


    #[Assert\Email(mode: 'html5')]
    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $contactEmail;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStoryPoints(): ?int
    {
        return $this->storyPoints;
    }

    public function setStoryPoints(int $storyPoints): self
    {
        $this->storyPoints = $storyPoints;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getContactEmail(): ?string
    {
        return $this->contactEmail;
    }

    public function setContactEmail(string $contactEmail): self
    {
        $this->contactEmail = $contactEmail;

        return $this;
    }
}