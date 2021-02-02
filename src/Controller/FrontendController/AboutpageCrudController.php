<?php

namespace App\Controller\FrontendController;

use App\Entity\Aboutpage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class AboutpageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Aboutpage::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $viewFile =  ImageField::new('viewFile')->setFormType(VichImageType::class);
        $view =  ImageField::new('view')->setBasePath('/frontendImages/Aboutimages/views');
        $fields = [
            
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
        if($pageName == Crud::PAGE_INDEX || $pageName == Crud::PAGE_DETAIL){
            $fields[] =  $view;
        }else{
          $fields[] =   $viewFile;
        }
        return $fields;
  
      }
    
}
