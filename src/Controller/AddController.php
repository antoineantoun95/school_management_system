<?php

namespace App\Controller;

use App\Entity\Course;
use App\Entity\Student;
use App\Form\AddClassType;
use App\Form\AddCourseType;
use App\Entity\StudentClass;
use App\Form\AddStudentType;
use App\Controller\WelcomeController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AddController extends AbstractController
{
    #[Route('/add_class', name: 'class_add')]
    public function add_class(Request $request, EntityManagerInterface $entityManager)
    {
        $entity = new StudentClass();
        $form = $this->createForm(AddClassType::class, $entity);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($entity);
            $entityManager->flush();
            $this->addFlash('success', 'Class added successfully!');
            return $this->redirectToRoute('list_index');
        }

        return $this->render('add_class/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route('/add_student', name: 'student_add')]
    public function add_student(Request $request, EntityManagerInterface $entityManager)
    {
        $entity = new Student();
        $form = $this->createForm(AddStudentType::class, $entity);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($entity);
            $entityManager->flush();
            $this->addFlash('success', 'Student added successfully!');
            return $this->redirectToRoute('list_index');
        }

        return $this->render('add_student/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/add_course', name: 'course_add')]
    public function add_course(Request $request, EntityManagerInterface $entityManager)
    {
        $entity = new Course();
        $form = $this->createForm(AddCourseType::class, $entity);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($entity);
            $entityManager->flush();
            $this->addFlash('success', 'Course added successfully!');
            return $this->redirectToRoute('list_index');
        }

        return $this->render('add_course/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}