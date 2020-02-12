<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GardenController extends AbstractController
{
    /**
     * @Route("/garden", name="garden")
     */
    public function index()
    {
        return $this->render('garden/index.html.twig', [
            'controller_name' => 'GardenController',
        ]);
    }
}
