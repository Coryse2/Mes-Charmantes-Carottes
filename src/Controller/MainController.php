<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    
    /**
     * @Route("/faq", name="about")
     */
    public function about()
    {
        return $this->render('main/about.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    
    /**
     * @Route("/mentions_légales", name="legal_notice")
     */
    public function legalNotice()
    {
        return $this->render('main/legalNotice.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

      /**
     * @Route("/accueil", name="homepage")
     */
    public function homepage()
    {
        return $this->render('main/accueil.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
