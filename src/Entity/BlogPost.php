<?php

namespace App\Entity;

use App\Validator\IsNotWeekend;
use Symfony\Component\Validator\Constraints as Assert;

class BlogPost
{
    #[Assert\Length(min: 15)]
    private $title;

    #[Assert\NotBlank]
    #[Assert\Date]
    #[IsNotWeekend]
    private $approvalDate;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getApprovalDate()
    {
        return $this->approvalDate;
    }

    /**
     * @param mixed $approvalDate
     */
    public function setApprovalDate($approvalDate): void
    {
        $this->approvalDate = $approvalDate;
    }
}