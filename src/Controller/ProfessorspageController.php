<?php

namespace App\Controller;
use App\Entity\Professors;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProfessorsRepository;


class ProfessorspageController extends AbstractController
{
    /**
     * @Route("/professorspage", name="professorspage")
     */
    public function index(ProfessorsRepository $ProfessorsRepository)
    {
        $Professor =$ProfessorsRepository->findAll();
        return $this->render('professorspage/index.html.twig', [
            'controller_name' => 'ProfessorspageController',
            'Professor' =>$Professor,
        ]);
    }
}
