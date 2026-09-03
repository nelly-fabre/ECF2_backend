<?php

namespace App\DataFixtures;

use App\Entity\Student;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Loads the 12 students.
 */
class StudentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $students = [
            ['afpaId' => 22116576, 'familyName' => 'Kehlaoui',     'firstName' => 'Adila'],
            ['afpaId' => 26020093, 'familyName' => 'Benerroua',    'firstName' => 'Mohammed'],
            ['afpaId' => 26020095, 'familyName' => 'Bellia',       'firstName' => 'Ghislène'],
            ['afpaId' => 26020096, 'familyName' => 'Camps',        'firstName' => 'Aurèle'],
            ['afpaId' => 26020097, 'familyName' => 'Fabre',        'firstName' => 'Nelly'],
            ['afpaId' => 26020141, 'familyName' => 'Casabianca',   'firstName' => 'Sarah'],
            ['afpaId' => 26020143, 'familyName' => 'Rojas Cuicas', 'firstName' => 'Juan'],
            ['afpaId' => 26020156, 'familyName' => 'Merlet',       'firstName' => 'Lucas'],
            ['afpaId' => 26020263, 'familyName' => 'Bannani',      'firstName' => 'Faten'],
            ['afpaId' => 26020268, 'familyName' => 'Kenzey',       'firstName' => 'Nathanael'],
            ['afpaId' => 26020916, 'familyName' => 'Lutard',       'firstName' => 'Anthony'],
            ['afpaId' => 26028145, 'familyName' => 'Saez',         'firstName' => 'Mélanie'],
        ];

        foreach ($students as $index => $data) {
            $student = new Student();
            $student->setIdAfpa($data['afpaId']);
            $student->setFamilyName($data['familyName']);
            $student->setFirstName($data['firstName']);
            // No picture yet: upload feature comes later

            $manager->persist($student);
            $this->addReference('student-' . $index, $student);
        }

        $manager->flush();
    }
}
