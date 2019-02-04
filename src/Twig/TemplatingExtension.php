<?php

namespace App\Twig;

use Twig\TwigFunction;
use App\Service\SendMailer;
use Twig\Extension\AbstractExtension;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class TemplatingExtension extends AbstractExtension
{

    public $sendMailer;
    public $mailer;
    public $param;

    public function __construct(SendMailer $sendMailer,\Swift_Mailer $mailer, ParameterBagInterface $param){
        $this->sendMailer = $sendMailer;
        $this->mailer = $mailer;
        $this->param = $param;
    }

    public function renderViewSendMessage()
    {
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('mgandega@gmail.com')
            ->setTo('mgandega@gmail.com')
            ->setBody(
                $this->sendMailer->sendMailerSwift($this->param->get('message'))
            );
        $this->mailer->send($message);
        return new Response('Message bien envoyé');
        
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('sendMail', [$this, 'renderViewSendMessage']),
        ];
    }

  
}
