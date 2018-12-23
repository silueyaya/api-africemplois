<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\EventSubscriber;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use FOS\UserBundle\FOSUserEvents;
//use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Mailer\Mailer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\KernelEvents;
use FOS\UserBundle\Util\TokenGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;


class UserEmailConfirmationListener extends Controller implements EventSubscriberInterface
{
    private $mailer;
    private $tokenGenerator;
    private $router;
    private $session;

    /**
     * UserEmailConfirmationListener constructor.
     *
     * @param Mailer         $mailer
     * @param TokenGeneratorInterface $tokenGenerator
     * @param UrlGeneratorInterface   $router
     * @param SessionInterface        $session
     */
    //$mailer, 
    public function __construct( TokenGeneratorInterface $tokenGenerator, UrlGeneratorInterface $router, SessionInterface $session)
    {
       // $this->mailer = $mailer;
        $this->tokenGenerator = $tokenGenerator;
        $this->router = $router;
        $this->session = $session;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(
            //FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess',
            KernelEvents::VIEW => ['onRegistrationSuccess', EventPriorities::POST_WRITE],

        );
    }


    public function onRegistrationSuccess(GetResponseForControllerResultEvent $event)
    {
        
        // /** @var $user \FOS\UserBundle\Model\UserInterface */
        //$user = $event->getForm()->getData();
        
        $user = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$user instanceof User || Request::METHOD_POST !== $method) {
            return;
        }
        $user->setEnabled(true);
        //$user->setEnabled(false);
        if (null === $user->getConfirmationToken()) {
            $user->setConfirmationToken($this->tokenGenerator->generateToken());
        }
        
        //$emailRequest = $this->get('fos_user.mailer.twig_swift');
        //$emailRequest->sendConfirmationEmailMessage($user);

        //$this->mailer->sendConfirmationEmailMessage($user);

        $this->session->set('fos_user_send_confirmation_email/email', $user->getEmail());

        $url = $this->router->generate('fos_user_registration_check_email');
       // $event->setResponse(new RedirectResponse($url));
    }
}
