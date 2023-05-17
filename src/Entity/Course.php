<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping as ORM;

/**
 * Course
 *
 * @ORM\Table(name="course")
 * @ORM\Entity
 */
class Course
{
    /**
     * @var int
     *
     * 
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * 
     * @OneToMany(targetEntity="StudentGrades", mappedBy="courseid")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="coursename", type="string", length=255, nullable=false)
     */
    private $coursename;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoursename(): ?string
    {
        return $this->coursename;
    }

    public function setCoursename(string $coursename): self
    {
        $this->coursename = $coursename;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }


}
