<?php

namespace App\Controller;

use App\Entity\Classe;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ClasseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Classe::class;
    }

 
    public function configureFields(string $pageName): iterable
    {
        return [
         
            TextField::new('title'),
            TextEditorField::new('content'),
            AssociationField::new('professors')->autocomplete(),
        ];
    }
    
}
