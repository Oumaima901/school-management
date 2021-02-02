<?php

namespace App\Controller\FrontendController;

use App\Entity\Events;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class EventsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Events::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        $picFile =  ImageField::new('pictureFile')->setFormType(VichImageType::class);
        $pic =  ImageField::new('picture')->setBasePath('/frontendImages/Eventsimages/pictures');
        $fields = [
            
            TextField::new('title'),
            TextEditorField::new('description'),
            TimeField::new('Time'),
            dateField::new('date')

        ];
        if($pageName == Crud::PAGE_INDEX || $pageName == Crud::PAGE_DETAIL){
            $fields[] =  $pic;
        }else{
          $fields[] =   $picFile;
        }
        return $fields;
  
      }
   
}
