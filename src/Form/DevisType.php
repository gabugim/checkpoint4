<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Devis;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DevisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', EntityType::class, ['class' => Category::class, 'choice_label' => 'name'])
            ->add('typeDeBien')
            ->add('budget')
            ->add('surface')
            ->add('description')
            ->add('mail')
            ->add('telephone')
            ->add('nom')
            ->add('prenom')
            ->add('codePostal')
            ->add('ville')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Devis::class,
            'category' => Category::class,
        ]);
    }
}
