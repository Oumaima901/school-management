<?php

namespace App\Controller;

use App\Entity\Student;
use App\Entity\Classe;
use App\Entity\User;
use App\Entity\Professors;
use App\Entity\Course;
use App\Entity\Homepage;
use App\Entity\Events;
use App\Entity\Aboutpage;
use App\Entity\Contactpage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\StudentRepository;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ClasseRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use App\Repository\CourseRepository;
use App\Repository\ProfessorsRepository;
use App\Repository\EventsRepository;


class DashboardController extends AbstractDashboardController
{    
    //declarer les proprietes (protected)
    protected $StudentRepository;
    protected $ClasseRepository;
    protected $CourseRepository;
    protected $ProfessorsRepository;
    protected $EventsRepository;

    public function __construct(  StudentRepository $StudentRepository ,ProfessorsRepository $ProfessorsRepository,
     ClasseRepository $ClasseRepository,EventsRepository $EventsRepository ,CourseRepository $CourseRepository){
      $this->StudentRepository = $StudentRepository;
      $this->ClasseRepository = $ClasseRepository;
      $this->CourseRepository = $CourseRepository;
      $this->ProfessorsRepository = $ProfessorsRepository;
      $this->EventsRepository = $EventsRepository;

    }




    /**
     * @Route("/admin", name="admin")
     * @return Response
     */
    public function index(): Response
    { 
          return  $this->render('bundles/EasyAdminBundle/welcome.html.twig', [

            'countStudent' => $this->StudentRepository->countStudent(),
            'countclasse' => $this->ClasseRepository->countclasse(),
            'countcourse' => $this->CourseRepository->countcourse(),
            'countprofessors' => $this->ProfessorsRepository->countprofessors(),
            'countevents' => $this->EventsRepository->countevents()
          ]);
       
       // $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        //return $this->redirect($routeBuilder->setController(PostCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
   {
       return Dashboard::new()
           ->setTitle('Our School Dashboard');
   }

    public function configureMenuItems(): iterable
   {   
       
    yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
    
    //we create a section
        yield MenuItem::section('Important');
        //yield MenuItem::linkToCrud('The Label', 'icon class', EntityClass::class);
        yield MenuItem::linkToCrud('Student','fas fa-user-graduate',student::class);
        yield MenuItem::linkToCrud('Classe','fas fa-chalkboard',classe::class);
        yield MenuItem::linkToCrud('Professors','fas fa-chalkboard-teacher',Professors::class);
        yield MenuItem::linkToCrud('Course','fas fa-book',Course::class);
       yield MenuItem::section('Settings');
       yield MenuItem::linkToCrud('User','fas fa-users',user::class);
       yield MenuItem::section('settings of pages');
       yield MenuItem::linkToCrud('Gallery ','fas fa-laptop-house',homepage::class);
       yield MenuItem::linkToCrud('About page','fas fa-digital-tachograph',aboutpage::class);
       yield MenuItem::linkToCrud('Contact Messages','fas fa-file-contract',contactpage::class);
       yield MenuItem::linkToCrud('Events','fas fa-calendar-alt',events::class);
      
    
    
    
    }
    public function adminDashboard()
{
    $this->denyAccessUnlessGranted('ROLE_ADMIN');

    // or add an optional message - seen by developers
    $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');
}
    //avatar
    public function configureUserMenu(UserInterface $user): UserMenu{
        return parent::configureUserMenu($user)
        ->setName($user->getEmail())
        ->setGravatarEmail($user->getEmail())
        ->displayUserAvatar(true)
        ;

    }
}
