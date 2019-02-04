<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\SendMailer;

class SendMailerController extends AbstractController
{

    /**
     * @Route("/send/mailer", name="send_mailer")
     */
    public function index()
    {
        return $this->render('send_mailer/index.html.twig');
    }
}
