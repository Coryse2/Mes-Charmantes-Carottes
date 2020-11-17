<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Garden;
use App\Entity\Vegetable;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
        //Title of the site
            ->setTitle('Mes Charmantes Carottes');
    }

    public function configureMenuItems(): iterable
    {
        return [
            
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            //Title of the part dedicated to garden and components administration
            MenuItem::section('Jardins et légumes'),
            //Objects that the admin can manage
            MenuItem::linkToCrud('Légumes', 'fa fa-tags', Vegetable::class),
            MenuItem::linkToCrud('Gardens', 'fa fa-file-text', Garden::class),
            //Title of the part User
            MenuItem::section('Users'),
            //Give the admin access to the User 
            MenuItem::linkToCrud('Users', 'fa fa-user', User::class),
        ];
    }
}
