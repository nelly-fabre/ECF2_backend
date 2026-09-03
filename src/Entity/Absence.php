<?php

namespace App\Entity;

use App\Repository\AbsenceRepository;
use Doctrine\ORM\Mapping as ORM;



#[ORM\Entity(repositoryClass: AbsenceRepository::class)]
#[ORM\Table(name: 'absences')]
class Absence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_absence')]
    private ?int $id = null;

    #[ORM\Column(name: 'absence_date_start', type: 'date')]
    private ?\DateTimeInterface $dateStart = null;

    #[ORM\Column(name: 'absence_date_end', type: 'date')]
    private ?\DateTimeInterface $dateEnd = null;

    #[ORM\Column(name: 'absence_document', length: 255, nullable: true)]
    private ?string $document = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'id_type', referencedColumnName: 'id_type', nullable: false)]
    private ?TypeAbsence $type = null;

    #[ORM\ManyToOne(inversedBy: 'absences')]
    #[ORM\JoinColumn(name: 'id_student', referencedColumnName: 'id_student', nullable: false)]
    private ?Student $student = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->dateStart;
    }

    public function setDateStart(\DateTimeInterface $dateStart): static
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(\DateTimeInterface $dateEnd): static
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getDocument(): ?string
    {
        return $this->document;
    }

    public function setDocument(?string $document): static
    {
        $this->document = $document;

        return $this;
    }

    public function getType(): ?TypeAbsence
    {
        return $this->type;
    }

    public function setType(?TypeAbsence $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): static
    {
        $this->student = $student;

        return $this;
    }
}
