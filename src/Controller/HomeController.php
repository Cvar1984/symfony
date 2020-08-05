<?php

namespace App\Controller;

use App\Service\Calculator;
use App\Service\Secret;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function view(Calculator $calc, Secret $sec)
    {
        return $this->render('base/home.html.twig', [
            'from' => 'twig',
            'number' => $calc->tambah(1, 1),
            'secret_key' => $sec::get()
        ]);
    }
}
