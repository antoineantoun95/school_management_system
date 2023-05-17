<?php

namespace App\Controller;

use App\Entity\Course;
use App\Entity\Student;
use App\Entity\StudentClass;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DeleteController extends AbstractController
{
    #[Route('/delete_class', name: 'app_delete_class')]
    public function delete_class(Request $request, EntityManagerInterface $entityManager)
    {

    $repository = $entityManager->getRepository(StudentClass::class);
    $data = $repository->findAll();
        
    $repository = $entityManager->getRepository(StudentClass::class);
    $entities = $repository->findAll();

    $ids = [];
    foreach ($entities as $entity) {
        $ids[$entity->getId()] = $entity->getId();
    }

    // Create the form with dropdown
    $form = $this->createFormBuilder()
        ->add('id', ChoiceType::class, [
            'choices' => $ids,
            'placeholder' => 'Select an ID',
            'label' => 'ID'
        ])
        ->add('delete', SubmitType::class, ['label' => 'Delete'])
        ->getForm();

    // Handle form submission
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {

        $data = $form->getData();

        // Delete the selected ID
        $idToDelete = $data['id'];
        $entityToDelete = $repository->find($idToDelete);

        if ($entityToDelete) {
            $entityManager->remove($entityToDelete);
            $entityManager->flush();
            $this->addFlash('success', 'Class deleted successfully!');
        } else {
            $this->addFlash('error', 'Class not found!');
        }

        // Redirect to the form page after deletion
        return $this->redirectToRoute('list_index');
    }

    // Render the form template
    return $this->render('delete_class/index.html.twig', [
        'form' => $form->createView(),
    ]);
    }


    #[Route('/delete_course', name: 'app_delete_course')]
    public function delete_course(Request $request, EntityManagerInterface $entityManager)
    {

    $repository = $entityManager->getRepository(Course::class);
    $data = $repository->findAll();
        
    $repository = $entityManager->getRepository(Course::class);
    $entities = $repository->findAll();

    $ids = [];
    foreach ($entities as $entity) {
        $ids[$entity->getId()] = $entity->getId();
    }

    // Create the form with dropdown
    $form = $this->createFormBuilder()
        ->add('id', ChoiceType::class, [
            'choices' => $ids,
            'placeholder' => 'Select an ID',
            'label' => 'ID'
        ])
        ->add('delete', SubmitType::class, ['label' => 'Delete'])
        ->getForm();

    // Handle form submission
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {

        $data = $form->getData();

        // Delete the selected ID
        $idToDelete = $data['id'];
        $entityToDelete = $repository->find($idToDelete);

        if ($entityToDelete) {
            $entityManager->remove($entityToDelete);
            $entityManager->flush();
            $this->addFlash('success', 'Course deleted successfully!');
        } else {
            $this->addFlash('error', 'Course not found!');
        }

        // Redirect to the form page after deletion
        return $this->redirectToRoute('list_index');
    }

    // Render the form template
    return $this->render('delete_course/index.html.twig', [
        'form' => $form->createView(),
    ]);
    }


    #[Route('/delete_student', name: 'app_delete_student')]
    public function delete_student(Request $request, EntityManagerInterface $entityManager)
    {

    $repository = $entityManager->getRepository(Student::class);
    $data = $repository->findAll();
        
    $repository = $entityManager->getRepository(Student::class);
    $entities = $repository->findAll();

    $ids = [];
    foreach ($entities as $entity) {
        $ids[$entity->getId()] = $entity->getId();
    }

    // Create the form with dropdown
    $form = $this->createFormBuilder()
        ->add('id', ChoiceType::class, [
            'choices' => $ids,
            'placeholder' => 'Select an ID',
            'label' => 'ID'
        ])
        ->add('delete', SubmitType::class, ['label' => 'Delete'])
        ->getForm();

    // Handle form submission
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {

        $data = $form->getData();

        // Delete the selected ID
        $idToDelete = $data['id'];
        $entityToDelete = $repository->find($idToDelete);

        if ($entityToDelete) {
            $entityManager->remove($entityToDelete);
            $entityManager->flush();
            $this->addFlash('success', 'Student deleted successfully!');
        } else {
            $this->addFlash('error', 'Student not found!');
        }

        // Redirect to the form page after deletion
        return $this->redirectToRoute('list_index');
    }

    // Render the form template
    return $this->render('delete_student/index.html.twig', [
        'form' => $form->createView(),
    ]);
    }

}
