<?php

namespace App\Controller\Admin;

use App\Entity\Recip;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RecipCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recip::class;
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
