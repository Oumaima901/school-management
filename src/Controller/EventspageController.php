<?php

namespace App\Controller;
use App\Entity\Events;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EventsRepository;

class EventspageController extends AbstractController
{
    /**
     * @Route("/eventspage", name="eventspage")
     */
    public function index(EventsRepository $EventsRepository)

    {
        $Event=$EventsRepository->findAll();
        return $this->render('eventspage/index.html.twig', [
            'controller_name' => 'EventspageController',
            'Event' =>$Event,
            
        ]);
    }
}
