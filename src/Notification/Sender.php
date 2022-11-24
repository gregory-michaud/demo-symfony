<?php

namespace App\Notification;

use App\Entity\User;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class Sender
{

    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendNewUserNotificationAdmin(User $user){

        $email = (new Email())
            ->from('accounts@series.fr')
            ->to('admin@series.fr')
            ->subject('new account created')
            ->html('<h1>New account!</h1>email:'.$user->getEmail());

        $this->mailer->send($email);

    }

}