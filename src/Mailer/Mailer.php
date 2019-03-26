<?php

namespace App\Mailer;

use App\Entity\User;

class Mailer
{
    private $mailer;
    private $twig;
    private $mailFrom;

    public function __construct(
        \Swift_Mailer $mailer,
        \Twig_Environment $twig,
        string $mailFrom
    )
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
        $this->mailFrom = $mailFrom;
    }

    public function sendConfirmation(User $user)
    {

        $body = $this->twig->render('email/registration.html.twig',[
            'user' => $user
        ]);

        $message = (new \Swift_Message())
            ->setSubject('Welcome to the micropost app')
            ->setFrom($this->mailFrom)
            ->setTo($user->getEmail())
            ->setBody($body, 'text/html');

        $this->mailer->send($message);
    }
}