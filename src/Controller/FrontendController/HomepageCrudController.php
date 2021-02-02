<?php

namespace App\Controller\FrontendController;

use App\Entity\Homepage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class HomepageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Homepage::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $imgFile =  ImageField::new('imageFile')->setFormType(VichImageType::class);
        $img =  ImageField::new('image')->setBasePath('/frontendImages/Homeimages/images');
        $fields = [
            
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
        if($pageName == Crud::PAGE_INDEX || $pageName == Crud::PAGE_DETAIL){
            $fields[] =  $img;
        }else{
          $fields[] =   $imgFile;
        }
        return $fields;
  
      }

}
