<?php

namespace App\Controller\Admin;

use App\Entity\Vegetable;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VegetableCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vegetable::class;
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
