<?php

namespace App\Controller\Admin;

use App\Entity\Node;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use App\Admin\Field\VichImageField;

class NodeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Node::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('lawyer');
        yield AssociationField::new('type');
        yield TextField::new('title');
        yield ImageField::new('application')
            ->onlyOnIndex()
            ->setBasePath('img/node/thumbnail/')
            // ->setUploadDir('public/img/node/')
        ;
        yield VichImageField::new('applicationImageFile', 'applicationImageFile')
            ->hideOnIndex()
            ;
        yield TextareaField::new('body')
            ->onlyOnForms()
            // ->addCssClass('test')
            ;
        yield TextField::new('others');
        yield DateTimeField::new('createdAt')
            ->onlyOnIndex();
    }
}
