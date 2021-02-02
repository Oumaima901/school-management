<?php

namespace App\Controller;

use App\Entity\Student;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class StudentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Student::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
          $imageFile =  ImageField::new('thumbnailFile')->setFormType(VichImageType::class);
          $image =  ImageField::new('thumbnail')->setBasePath('/images/thumbnails');
        $fields = [
            
            TextField::new('fullname'),
            EmailField::new('email_address'),
            TextField::new('gender'),
            DateField::new('birthday'),
            TextField::new('address'),
            TelephoneField::new('phone_number'),
            AssociationField::new('classe')->autocomplete(),
       
        ];


      if($pageName == Crud::PAGE_INDEX || $pageName == Crud::PAGE_DETAIL){
          $fields[] =  $image;
      }else{
        $fields[] =   $imageFile;
      }
      return $fields;

    }
    
}
