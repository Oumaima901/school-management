<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentPageController extends AbstractController
{
    /**
     * @Route("/student/page", name="student_page")
     */
    public function index(): Response
    {
        return $this->render('student_page/index.html.twig', [
            'controller_name' => 'StudentPageController',
        ]);
    }
    public function userfront()
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
    
        // or add an optional message - seen by developers
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'User tried to access a page without having ROLE_ADMIN');
    }
}
