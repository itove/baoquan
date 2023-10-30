<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->onlyOnIndex();
        yield TextField::new('username');
        yield TextField::new('phone');
        yield TextField::new('openid')->onlyOnIndex();
        yield TextField::new('name');
        // yield TextField::new('avatar');
        yield ChoiceField::new('roles')
            ->setChoices(['Admin' => 'ROLE_ADMIN', 'User' => 'ROLE_USER'])
            ->allowMultipleChoices()
            ->setRequired(false)
        ;
        yield AssociationField::new('firm');
        yield DateTimeField::new('createdAt')->onlyOnIndex();
    }
}
