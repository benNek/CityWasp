<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Klientas;
use Symfony\Component\HttpFoundation\Request;

class NewslettersController extends AbstractController
{
    /**
     * @Route("/sendNewsletters", name="sendNewsletters")
     */
    public function sendNewsletters(Request $request, \Swift_Mailer $mailer)
    {
        $results = $this->getDoctrine()->getRepository(Klientas::class)->findByNewsletter();

        foreach ($results as $r)
        {
            $message = (new \Swift_Message('Naujienlaiškis'))
            ->setFrom('no-reply@citywasp.lt')
            ->setTo($r->getElPastas())
            ->setBody(
                $this->renderView(
                    'email\newsletterEmail.html.twig'
                ),
                'text/html'
            );
            $mailer->send($message);
        }


        return $this->render('/home/index.html.twig', [
            'results'  => $results,
        ]);
    }
}
