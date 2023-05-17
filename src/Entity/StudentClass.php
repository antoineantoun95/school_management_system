<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping as ORM;

/**
 * StudentClass
 *
 * @ORM\Table(name="student_class")
 * @ORM\Entity
 */
class StudentClass
{
    /**
     * @var int
     *
     * @OneToMany(targetEntity="StudentGrades", mappedBy="classid")
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="classname", type="string", length=255, nullable=false)
     */
    private $classname;

    /**
     * @var string
     *
     * @ORM\Column(name="classsection", type="string", length=255, nullable=false)
     */
    private $classsection;
/*
    /**
     * @var int
     *
     * @ORM\Column(name="classid", type="integer", nullable=false)
     */
//    private $classid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClassname(): ?string
    {
        return $this->classname;
    }

    public function setClassname(string $classname): self
    {
        $this->classname = $classname;

        return $this;
    }

    public function getClasssection(): ?string
    {
        return $this->classsection;
    }

    public function setClasssection(string $classsection): self
    {
        $this->classsection = $classsection;

        return $this;
    }

    /*public function getClassid(): ?int
    {
        return $this->classid;
    }

    public function setClassid(int $classid): self
    {
        $this->classid = $classid;

        return $this;
    }*/


}
