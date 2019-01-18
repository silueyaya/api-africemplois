<?php
// api/src/EventSubscriber/PostulerMailSubscriber.php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Candidature;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class PostulerMailSubscriber implements EventSubscriberInterface
{
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['sendMail', EventPriorities::POST_WRITE],
        ];
    }

    public function sendMail(GetResponseForControllerResultEvent $event)
    {
        $candidature = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$candidature instanceof Candidature || Request::METHOD_POST !== $method) {
            return;
        }

        $message = (new \Swift_Message('Candidature à votre offre [ %s ].', $candidature->getTitreOffre()))
            ->setFrom(['superhitya2@gmail.com' => 'AfricEmplois'])
            ->setTo($candidature->getMailEntreprise())
            //->attach(\Swift_Attachment::fromPath('http://d1pwix07io15pr.cloudfront.net/v9dffeddd70/images/logos/sf-positive.svg'))
            ->attach( \Swift_Attachment::fromPath('http://africemplois.herokuapp.com/images/cv/'. $candidature->getCvUrl()))
            //->attach(\Swift_Attachment::fromPath('http : //127.0.0.1:8000/images/cv/'. $candidature->getCvUrl()), 'application/pdf')
            ->setBody(sprintf('Le candidat ayant pour E-mail %s vient de postuler à votre Offre [ %s ].', $candidature->getMailUser() ,$candidature->getTitreOffre()));
        $this->mailer->send($message);
    }
}

