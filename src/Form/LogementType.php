<?php

namespace App\Form;

use App\Entity\Logement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class LogementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('superficie')
            ->add('nbPieceHabitable', ChoiceType::class, [
                'choices'=> [
                    '1 pèce'=>1,
                    '2 pèces'=>2,
                    '3 pèces'=>3,
                    '4 pèces'=>4,
                    '5 pèces'=>5,
                    '6 pèces'=>6,
                    '7 pèces'=>7,
                    '8 pèces'=>8,
                    '9 pèces'=>9,
                    '10 pèces'=>10,
                    '11 pèces'=>11,
                    '12 pèces'=>12,
                    '13 pèces'=>13,
                    '14 pèces'=>14,
                    '15 pèces'=>15,
                ]
            ])
            ->add('typeLogement', ChoiceType::class, [
                'choices'=> [
                    'Appartement'=>"Appartement",
                    'Maison'=>"Maison",
                    'Yourte'=>"Yourte"
                ]
            ])
            ->add('adresse')
            ->add('codePostal')
            ->add('piscine', ChoiceType::class, [
                'choices'=> [
                    'Oui'=>true,
                    'Non'=>false
                ]
            ])
            ->add('exterieur', ChoiceType::class, [
                  'choices'=> [
                      'Oui'=>true,
                      'Non'=>false
                  ]
            ])
            ->add('surface')
            ->add('garage', ChoiceType::class, [
                'choices'=> [
                    'Oui'=>true,
                    'Non'=>false
                ]
            ])
            ->add('venteLocation', ChoiceType::class, [
                'choices'=> [
                    'Location'=>"Location",
                    'Vente'=>"Vente"
                ]
            ])
            ->add('prixVenteLocation')
           // ->add('dateParution')
            ->add('photo', FileType::class,[
                  'mapped'=>false,
                  'constraints'=>[
                       new Image ([
                           'maxSize' => '7000k',
                           'mimeTypesMessage'=>"Format d'image nons autorisé"
                       ])
                  ]
            ])
            ->add('ville')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Logement::class,
        ]);
    }
}
