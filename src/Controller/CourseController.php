<?php

namespace App\Controller;
use App\Entity\Course;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CourseRepository;

class CourseController extends AbstractController
{
    /**
     * @Route("/Course", name="Course")
     */
    public function index(CourseRepository $CourseRepository)
    {
        $Course=$CourseRepository->findAll();
        return $this->render('course/course.html.twig', [
            'controller_name' => 'CourseController',
            'Course' =>$Course,
            
        ]);
    }

}
