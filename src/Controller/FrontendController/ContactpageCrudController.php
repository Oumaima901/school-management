<?php

namespace App\Controller\FrontendController;

use App\Entity\Contactpage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;

use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContactpageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contactpage::class;
    }

  
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('title'),
            TextEditorField::new('Message'),
            EmailField::new('email'),
            TextField::new('Subject'),
           
        ];
    }
   
}
