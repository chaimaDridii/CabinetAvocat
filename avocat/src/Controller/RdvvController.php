<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RdvvController extends AbstractController
{
    /**
     * @Route("/rdvv", name="rdvv")
     */
    public function index(): Response
    {
        return $this->render('rdvv/index.html.twig', [
            'controller_name' => 'RdvvController',
        ]);
    }
}
