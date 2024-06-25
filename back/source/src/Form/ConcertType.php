<?php

namespace App\Form;

use App\Entity\Groups;
use App\Entity\Concert;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;



class ConcertType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('descriptions')
            ->add('dateConcert')
            ->add('pictures')
            ->add('tag')
            ->add('prix')
            ->add('numberOfPlace')
            ->add('groupName', EntityType::class,[ // type an le groupeName entity c pour ca qu'on a mis entitytype, efa classe de symfony 
                'class' => Groups::class, // eto le entity ou class Groups le ery am entity no ampetraka eto 
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Concert::class,
        ]);
    }
}
