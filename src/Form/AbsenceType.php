<?php

namespace App\Form;

use App\Entity\Absence;
use App\Entity\Student;
use App\Entity\TypeAbsence;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class AbsenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateStart', DateType::class, [
                'label' => 'Date de début',
                'widget' => 'single_text',
            ])
            ->add('dateEnd', DateType::class, [
                'label' => 'Date de fin',
                'widget' => 'single_text',
            ])
            ->add('type', EntityType::class, [
                'class' => TypeAbsence::class,
                'choice_label' => 'name',
                'label' => 'Motif',
                'placeholder' => 'Sélectionnez un motif',
            ])
            ->add('student', EntityType::class, [
                'class' => Student::class,
                'choice_label' => function (Student $student) {
                    return $student->getFirstName() . ' ' . $student->getFamilyName();
                },
                'label' => 'Stagiaire',
                'placeholder' => 'Sélectionnez un stagiaire',
            ])
            ->add('documentFile', FileType::class, [
                'label' => 'Justificatif PDF (facultatif)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File(
                        maxSize: '5M',
                        mimeTypes: ['application/pdf'],
                        mimeTypesMessage: 'Veuillez déposer un fichier PDF valide.',
                    ),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Absence::class,
        ]);
    }
}
