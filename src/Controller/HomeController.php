<?php

namespace App\Controller;

use App\Service\Environment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function view(Environment $env)
    {
        return $this->render('base/home.html.twig', [
            'from' => 'twig',
            'app_name' => $env::get('app_name'),
        ]);
    }
}
