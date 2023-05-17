<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping as ORM;

/**
 * StudentGrades
 *
 * @ORM\Table(name="student_grades")
 * @ORM\Entity
 */
class StudentGrades
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="studentid", type="integer", nullable=false)
     * @ManyToOne(targetEntity="Student", inversedBy="id")
     * @JoinColumn(name="studentid", referencedColumnName="id")
     */
    private $studentid;

    /**
     * @var int
     *
     * @ORM\Column(name="classid", type="integer", nullable=false)
     * @ManyToOne(targetEntity="StudentClass", inversedBy="id")
     * @JoinColumn(name="classid", referencedColumnName="id")
     */
    private $classid;

    /**
     * @var int
     *
     * @ORM\Column(name="courseid", type="integer", nullable=false)
     * @ManyToOne(targetEntity="Course", inversedBy="id")
     * @JoinColumn(name="courseid", referencedColumnName="id")
     */
    private $courseid;

    /**
     * @var float
     *
     * @ORM\Column(name="grade", type="float", precision=10, scale=0, nullable=false)
     */
    private $grade;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStudentid(): ?int
    {
        return $this->studentid;
    }

    public function setStudentid(int $studentid): self
    {
        $this->studentid = $studentid;

        return $this;
    }

    public function getClassid(): ?int
    {
        return $this->classid;
    }

    public function setClassid(int $classid): self
    {
        $this->classid = $classid;

        return $this;
    }

    public function getCourseid(): ?int
    {
        return $this->courseid;
    }

    public function setCourseid(int $courseid): self
    {
        $this->courseid = $courseid;

        return $this;
    }

    public function getGrade(): ?float
    {
        return $this->grade;
    }

    public function setGrade(float $grade): self
    {
        $this->grade = $grade;

        return $this;
    }


}
