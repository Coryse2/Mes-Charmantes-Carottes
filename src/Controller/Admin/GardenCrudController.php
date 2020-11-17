<?php

namespace App\Controller\Admin;

use App\Entity\Garden;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GardenCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Garden::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
