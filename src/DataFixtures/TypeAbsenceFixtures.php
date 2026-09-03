<?php

namespace App\DataFixtures;

use App\Entity\TypeAbsence;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Loads the 4 fixed absence reasons required by the specification.
 */
class TypeAbsenceFixtures extends Fixture
{
    public const SICKNESS = 'type-sickness';
    public const UNJUSTIFIED = 'type-unjustified';
    public const LEGAL_ABSENCE = 'type-legal-absence';
    public const WORK_ACCIDENT = 'type-work-accident';

    public function load(ObjectManager $manager): void
    {
        $types = [
            self::SICKNESS      => 'maladie',
            self::UNJUSTIFIED   => 'sans motif',
            self::LEGAL_ABSENCE => 'absence légale',
            self::WORK_ACCIDENT => 'accident du travail',
        ];

        foreach ($types as $reference => $name) {
            $type = new TypeAbsence();
            $type->setName($name);

            $manager->persist($type);
            $this->addReference($reference, $type);
        }

        $manager->flush();
    }
}
