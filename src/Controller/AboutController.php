<?php

namespace App\Controller;
use App\Entity\Aboutpage;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AboutpageRepository;

class AboutController extends AbstractController
{
    /**
     * @Route("/about", name="about")
     */
    public function index(AboutpageRepository $AboutpageRepository)
    {
        $Aboutpage=$AboutpageRepository->findAll();
        return $this->render('about/index.html.twig', [
            'controller_name' => 'AboutController',
            'Aboutpage' =>$Aboutpage,
            
        ]);
    }

}
