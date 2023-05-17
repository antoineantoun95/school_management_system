<?php

namespace App\Controller;

use App\Entity\StudentClass;
use App\Entity\Student;
use App\Entity\Course;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WelcomeController extends AbstractController
{
    #[Route('/', name: 'app_welcome')]
    public function index(): Response
    {
        return $this->render('welcome/index.html.twig', [
            'controller_name' => 'WelcomeController',
        ]);
    }

    #[Route('/list', name: 'List')]
    public function index_list(EntityManagerInterface $em): Response
    {
        $repository = $em->getRepository(Student::class);
        $student_data = $repository->findAll();

        $repository = $em->getRepository(Course::class);
        $course_data = $repository->findAll();

        $repository = $em->getRepository(StudentClass::class);
        $class_data = $repository->findAll();

        return $this->render('list/index.html.twig', [
            'controller_name' => 'StudentController',
            'student_data' => $student_data,
            'course_data' => $course_data,
            'class_data' => $class_data,
        ]);
    }

    #[Route('/student', name: 'Students')]
    public function index_student(EntityManagerInterface $em): Response
    {
        $repository = $em->getRepository(Student::class);
        $data = $repository->findAll();

        return $this->render('students/index.html.twig', [
            'controller_name' => 'StudentController',
            'students_data' => $data,
        ]);
    }

    #[Route('/course', name: 'Courses')]
    public function index_course(EntityManagerInterface $em): Response
    {
        $repository = $em->getRepository(Course::class);
        $data = $repository->findAll();


        return $this->render('courses/index.html.twig', [
            'controller_name' => 'CourseController',
            'courses_data' => $data,
        ]);
    }

    #[Route('/class', name: 'Classes')]
    public function index_class(EntityManagerInterface $em): Response
    {
        $repository = $em->getRepository(StudentClass::class);
        $data = $repository->findAll();


        return $this->render('classes/index.html.twig', [
            'controller_name' => 'NewControllerNameController',
            'classes_data' => $data,
        ]);
    }

}
