<?php

namespace App\Controller;

use App\Service\Environment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
// ..

class HomeController extends AbstractController
{
    public function view(Environment $env): Response
    {
        return $this->render('base/home.html.twig', [
            'from' => 'twig',
            'app_name' => $env::get('app_name'),
        ]);
    }
}
