<?php
declare(strict_types=1);

/*
 * @package    agitation/webapp-bundle
 * @link       http://github.com/agitation/webapp-bundle
 * @author     Alexander Günsche
 * @license    http://opensource.org/licenses/MIT
 */

namespace Agit\WebappBundle\Service;

use Agit\IntlBundle\Tool\Translate;
use Agit\PageBundle\Service\PageService;
use Agit\TriggerBundle\Service\TriggerData;
use Agit\TriggerBundle\Service\TriggerEvent;
use Agit\TriggerBundle\Service\TriggerService;
use Agit\UserBundle\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Swift_Mailer;
use Swift_Message;
use Symfony\Bundle\TwigBundle\TwigEngine;

class PasswordService
{
    const TRIGGER_TAG = 'webapp.pass.reset';

    private $entityManager;

    private $userService;

    private $mailerService;

    private $triggerService;

    private $templatingService;

    private $pageService;

    private $mailFrom;

    public function __construct(
        EntityManagerInterface $entityManager,
        UserService $userService,
        Swift_Mailer $mailerService,
        TwigEngine $templatingService,
        TriggerService $triggerService,
        PageService $pageService,
        $mailFrom
    ) {
        $this->entityManager = $entityManager;
        $this->userService = $userService;
        $this->pageService = $pageService;
        $this->mailerService = $mailerService;
        $this->templatingService = $templatingService;
        $this->triggerService = $triggerService;
        $this->mailFrom = $mailFrom;
    }

    public function registerPasswordReset($email, $password)
    {
        $user = $this->userService->getUser($email);
        $encPass = $this->userService->encodePassword($user, $password);

        $message = new Swift_Message(Translate::t('Password reset'));
        $message
            ->setFrom([$this->mailFrom])
            ->setTo([$user->getEmail() => $user->getName()]);

        $trigger = new TriggerData(['id' => $user->getId(), 'encPass' => $encPass]);
        $token = $this->triggerService->createTrigger(self::TRIGGER_TAG, $trigger);

        $message->setBody($this->templatingService->render(
            'AgitWebappBundle:Mail:passreset.txt.twig',
            [
                'name' => $user->getName(),
                'url' => $this->pageService->createUrl('/user/newpass') . "#!/confirm?$token"
            ]
        ), 'text/plain');

        $this->mailerService->send($message);
    }

    public function updatePassword(TriggerEvent $event)
    {
        $data = $event->getData();
        $user = $this->userService->getUser($data['id']);
        $user->setPassword($data['encPass']);

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}
