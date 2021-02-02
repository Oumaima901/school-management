<?php

namespace App\Controller;

use App\Entity\Course;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class CourseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Course::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        $imaFile =  ImageField::new('figureFile')->setFormType(VichImageType::class);
        $ima =  ImageField::new('figure')->setBasePath('/Courseimages/figures');

        $fields =[
            TextField::new('course_name'),
            DateTimeField::new('course_duration'),
            MoneyField::new('course_price')->setCurrency('USD'),
            TextEditorField::new('description'),
            AssociationField::new('professors')->autocomplete(),
        ];
        if($pageName == Crud::PAGE_INDEX || $pageName == Crud::PAGE_DETAIL){
            $fields[] =  $ima;
        }else{
          $fields[] =   $imaFile;
        }
        return $fields;
  
      }
}
