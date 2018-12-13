<?php
// api/src/EventSubscriber/PostulerMailSubscriber.php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Candidature;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class ConfirmMailSubscriber implements EventSubscriberInterface
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

        $message = (new \Swift_Message('Candidature à votre offre'))
            ->setFrom('superhitya2@gmail.com')
            ->setTo($candidature->getMailEntreprise())
            ->setBody(sprintf('L\'utilisateur ayant pour Mail #%s vient de postuler à votre Offre.', $candidature->getMailUser()));

        $this->mailer->send($message);
    }

    
}

