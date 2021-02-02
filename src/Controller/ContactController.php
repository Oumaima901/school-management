<?php

namespace App\Controller;
use App\Entity\Contactpage;
use App\Form\MessageContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request; 
use Doctrine\ORM\EntityManagerInterface;
class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index( Request $request, EntityManagerInterface $entityManager): Response
    {

        $contact = new Contactpage();
        $form = $this->createForm(MessageContactFormType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
         
$entityManager->persist($contact);
$entityManager->flush();
    return new Response('Your message has been sent');

        }


        return $this->render('contact/index.html.twig', [
            'contactmg_form' => $form->createView()
        ]);
    }
}
