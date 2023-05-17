<?php

namespace App\Controller;

use App\Entity\Course;
use App\Entity\Student;
use App\Entity\StudentClass;
use App\Form\EditStudentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EditController extends AbstractController
{
    #[Route('/edit_student', name: 'student_edit')]
    public function edit_student(Request $request, EntityManagerInterface $entityManager)
    {
        
    $repository = $entityManager->getRepository(Student::class);
    $entities = $repository->findAll();

    $ids = [];
    foreach ($entities as $entity) {
        $ids[$entity->getId()] = $entity->getId();
    }

    
    $form = $this->createFormBuilder()
        
        ->add('id', ChoiceType::class, [
            'choices' => $ids,
            'placeholder' => 'Select an ID',
            'label' => 'ID'
        ])
        ->add('firstname')
        ->add('lastname')
        ->add('dateOfBirth', BirthdayType::class, [
            'label' => 'Date of Birth',
            'widget' => 'choice',
            'years' => range(1900, date('Y')),
        ])
        ->add('image',  FileType::class , [
            'label' => 'Image',
            'required' => false,
        ])
        ->add('Save', SubmitType::class, ['label' => 'Save'])
        ->getForm();

    // Handle form submission
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {

        $data = $form->getData();
        
        $idToedit = $data['id'];
        $entityToedit = $repository->find($idToedit);

        if ($entityToedit) {
            $entityToedit->setFirstname($form->get('firstname')->getData());
            $entityToedit->setLastname($form->get('lastname')->getData());
            $entityToedit->setDateOfBirth($form->get('dateOfBirth')->getData());
            $entityToedit->setImage($form->get('image')->getData());
            $entityManager->flush();
            $this->addFlash('success', 'Student edited successfully!');
        } else {
            $this->addFlash('error', 'Student not found!');
        }

        // Redirect to the form page after deletion
        return $this->redirectToRoute('list_index');
    }

    // Render the form template
    return $this->render('/edit_student/index.html.twig', [
        'form' => $form->createView(),
    ]);
    }

    
    
    #[Route('/edit_class', name: 'class_edit')]
    public function edit_class(Request $request, EntityManagerInterface $entityManager)
    {
        
    $repository = $entityManager->getRepository(StudentClass::class);
    $entities = $repository->findAll();

    $ids = [];
    foreach ($entities as $entity) {
        $ids[$entity->getId()] = $entity->getId();
    }

    
    $form = $this->createFormBuilder()
        
        ->add('id', ChoiceType::class, [
            'choices' => $ids,
            'placeholder' => 'Select an ID',
            'label' => 'ID'
        ])
        ->add('classname')
        ->add('classsection')
        ->add('Save', SubmitType::class, ['label' => 'Save'])
        ->getForm();

    // Handle form submission
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {

        $data = $form->getData();
        
        $idToedit = $data['id'];
        $entityToedit = $repository->find($idToedit);

        if ($entityToedit) {
            $entityToedit->setClassname($form->get('classname')->getData());
            $entityToedit->setClasssection($form->get('classsection')->getData());
            $entityManager->flush();
            $this->addFlash('success', 'Class edited successfully!');
        } else {
            $this->addFlash('error', 'Class not found!');
        }

        // Redirect to the form page after deletion
        return $this->redirectToRoute('list_index');
    }

    // Render the form template
    return $this->render('/edit_class/index.html.twig', [
        'form' => $form->createView(),
    ]);
    
    }



    #[Route('/edit_class', name: 'class_edit')]
    public function edit_course(Request $request, EntityManagerInterface $entityManager)
    {
        
    $repository = $entityManager->getRepository(Course::class);
    $entities = $repository->findAll();

    $ids = [];
    foreach ($entities as $entity) {
        $ids[$entity->getId()] = $entity->getId();
    }

    
    $form = $this->createFormBuilder()
        
        ->add('id', ChoiceType::class, [
            'choices' => $ids,
            'placeholder' => 'Select an ID',
            'label' => 'ID'
        ])
        ->add('coursename')
        ->add('description')
        ->add('Save', SubmitType::class, ['label' => 'Save'])
        ->getForm();

    // Handle form submission
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {

        $data = $form->getData();
        
        $idToedit = $data['id'];
        $entityToedit = $repository->find($idToedit);

        if ($entityToedit) {
            $entityToedit->setCoursename($form->get('coursename')->getData());
            $entityToedit->setDescription($form->get('description')->getData());
            $entityManager->flush();
            $this->addFlash('success', 'Course edited successfully!');
        } else {
            $this->addFlash('error', 'Course not found!');
        }

        // Redirect to the form page after deletion
        return $this->redirectToRoute('list_index');
    }

    // Render the form template
    return $this->render('/edit_class/index.html.twig', [
        'form' => $form->createView(),
    ]);
    
    }
    
}
