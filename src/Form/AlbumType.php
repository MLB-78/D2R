<?php

namespace App\Form;

use App\Entity\Album;
use App\Entity\Style;
use App\Entity\Artiste;
use App\Form\AlbumType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AlbumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr'=>[
                    'placeholder'=>"Nom de l'album"
                ]
            ])
            ->add('image', UrlType::class, [
                'attr'=>[
                    'placeholder'=>"Saisir l'URL d'une image"
                ]
            ])
            ->add('date', TextType::class, [
                'attr' => [
                    'placeholder' => "Ex: 1993"
                ]
            ])
            ->add('artiste', EntityType::class, [
                'class'=>Artiste::class,
                'placeholder' => "Choisissez un artiste",
                'choice_label'=>'nom',
                'required'=>false

            ])
            ->add('styles', EntityType::class, [
                'class'=>Style::class,
                'choice_label'=>'nom',
                'required'=>false,
                'multiple'=>true

            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Album::class,
        ]);
    }
}
