<?php

namespace App\Controller\Admin;

use App\Entity\Others;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use App\Admin\Field\VichImageField;

class OthersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Others::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name');
        yield ImageField::new('image')
            ->onlyOnIndex()
            ->setBasePath('img/others/')
            // ->setUploadDir('public/img/node/')
        ;
        yield VichImageField::new('imageFile', 'ImageFile')
            ->hideOnIndex()
        ;
    }
}
