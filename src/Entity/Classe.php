<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClasseRepository::class)
 */
class Classe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;
    
    /**
     * @ORM\OneToMany(targetEntity="Student",mappedBy="classe")
     */
    private $students;

    /**
     * @ORM\ManyToMany(targetEntity=Professors::class, mappedBy="classes")
     */
    private $professors;
   

    public function __construct()
    {
        $this->students = new ArrayCollection();
        $this->professors = new ArrayCollection();
        
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return Collection|Student[]
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
            $student->setClasse($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->students->removeElement($student)) {
            // set the owning side to null (unless already changed)
            if ($student->getClasse() === $this) {
                $student->setClasse(null);
            }
        }

        return $this;
    }
    public function __toString(){
        return $this->title;
    }

    /**
     * @return Collection|Professors[]
     */
    public function getProfessors(): Collection
    {
        return $this->professors;
    }

    public function addProfessor(Professors $professor): self
    {
        if (!$this->professors->contains($professor)) {
            $this->professors[] = $professor;
            $professor->addClass($this);
        }

        return $this;
    }

    public function removeProfessor(Professors $professor): self
    {
        if ($this->professors->removeElement($professor)) {
            $professor->removeClass($this);
        }

        return $this;
    }

    
}
