<?php

namespace App\Controller;
use App\Entity\Student;
use App\Entity\Aboutpage;
use App\Entity\Homepage;
use App\Entity\Professors;
use App\Entity\Events;
use App\Entity\Course;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AboutpageRepository;
use App\Repository\StudentRepository;
use App\Repository\HomepageRepository;
use App\Repository\ProfessorsRepository;
use App\Repository\CourseRepository;
use App\Repository\EventsRepository;

class FrontController extends AbstractController
{
    protected $StudentRepository;
    protected $ProfessorsRepository;
    protected $CourseRepository;
    protected $EventsRepository;
    public function __construct(StudentRepository $StudentRepository, ProfessorsRepository $ProfessorsRepository,CourseRepository $CourseRepository, EventsRepository $EventsRepository)
    {
        $this->StudentRepository = $StudentRepository;
        $this->ProfessorsRepository = $ProfessorsRepository;
        $this->CourseRepository = $CourseRepository;
        $this->EventsRepository = $EventsRepository;
    }
    /**
     * @Route("/front", name="front")
     */
    public function index(StudentRepository $StudentRepository ,EventsRepository $EventsRepository,CourseRepository $CourseRepository, ProfessorsRepository $ProfessorsRepository,AboutpageRepository $AboutpageRepository,HomepageRepository $HomepageRepository)
    {
        $Aboutpage=$AboutpageRepository->findBy([],['title'=>'ASC'],1);
        $student=$StudentRepository->findAll();
        $Homepage=$HomepageRepository->findBy([],['title'=>'ASC'],1);
        $Course=$CourseRepository->findAll();
        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController',
            'countcourse' => $this->CourseRepository->countcourse(),
            'countevents' => $this->EventsRepository->countevents(),
            'countprofessors' => $this->ProfessorsRepository->countprofessors(),
            'countStudent' => $this->StudentRepository->countStudent(),
            'Aboutpage' =>$Aboutpage,
            'student' =>$student,
            'Homepage' =>$Homepage,
            'Course' =>$Course,
        ]);
    }
    
    
  
    
}
