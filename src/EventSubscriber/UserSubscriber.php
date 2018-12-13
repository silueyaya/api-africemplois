<?php
// api/src/Api/EventSubscriber/UserSubscriber.php
namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
#use App\Manager\UserManager;
use FOS\UserBundle\Model\UserManagerInterface;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
//use FOS\UserBundle\Mailer\Mailer;
use FOS\UserBundle\Util\TokenGeneratorInterface;

final class UserSubscriber implements EventSubscriberInterface
{
    private $userManager;
    //private $mailer;
    private $tokenGenerator;

    /**
     * EmailConfirmationListener constructor.
     *
     * @param TokenGeneratorInterface $tokenGenerator
     */
    public function __construct(UserManagerInterface $userManager , TokenGeneratorInterface $tokenGenerator)
    {
        //$this->mailer = $mailer;Mailer $mailer
        $this->tokenGenerator = $tokenGenerator;
        $this->userManager = $userManager;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['sendPasswordReset', EventPriorities::POST_VALIDATE],
        ];
    }

    public function sendPasswordReset(GetResponseForControllerResultEvent $event)
    {
        $request = $event->getRequest();

        if ('api_forgot_password_requests_post_collection' !== $request->attributes->get('_route')) {
            return;
        }

        $forgotPasswordRequest = $event->getControllerResult();

        $user = $this->userManager->findUserByUsernameOrEmail($forgotPasswordRequest->email);

        // We do nothing if the user does not exist in the database
       # if ($user) {
           # $this->userManager->requestPasswordReset($user);
          #  $this->mailer->sendConfirmationEmailMessage($user);

    #    }

        if (null === $user->getConfirmationToken()) {
            $user->setConfirmationToken($this->tokenGenerator->generateToken());
        }

       // $this->mailer->sendConfirmationEmailMessage($user);


        $event->setResponse(new JsonResponse(null, 204));
    }
}