<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ErrorController extends AbstractController
{
    public function view()
    {
        return $this->render('error/404.html.twig');
    }
}
