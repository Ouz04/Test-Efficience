<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Mail;
use App\Form\ContactType;
use PhpParser\Builder\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request,\Swift_Mailer $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

              if ($form->isSubmitted() && $form->isValid()) {
                  $contactFormData = $form->getData();
                  //j'envoie le mail
                  $message = (new \Swift_Message('Nouveau contact!'))
                      //on récupère l'adresse mail de l'expéditeur
                      ->setFrom($contactFormData->getEmail())
                      //on récupère l'adresse mail du destinataire
                      ->setTo($contactFormData->getDepartement()->getEmail())
                      //on récupere le message de l'expéditeur
                      ->setBody(
                                 $contactFormData->getMessage(),
                                 'text/plain'
                                );
                      $mailer->send($message);
                      $this->addFlash('success', 'Le message a été bien envoyé !');
                       return $this->redirectToRoute('contact');
              }
               return $this->render('contact/index.html.twig', [
               'our_form' => $form->createView(),
        ]);
    }


}
