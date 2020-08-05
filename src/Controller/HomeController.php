<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function view()
    {
        return $this->render('base/home.html.twig', [
            'from' => 'twig'
        ]);
    }
}
