<?php

namespace App\Form;

use App\Entity\animals;
use App\Entity\Articles;
use App\Entity\Breed;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('author', null, [
                'label' => 'Auteur/e',
            ])
            ->add('description', null, [
                'label' => 'Description',
            ])
            ->add('animals', EntityType::class, [
                'class' => animals::class,
                'choice_label' => 'name',
                'label' => 'Animal',
            ])
            ->add('breed', EntityType::class, [
                'class' => Breed::class,
                'choice_label' => 'name',
                'required' => false,
                'label' => 'Race',
            ])
            ->add('img', FileType::class, [
                'label' => 'Image',
                'mapped' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Articles::class,
        ]);
    }
}
