<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=CourseRepository::class)
 * @Vich\Uploadable()
 */
class Course
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
    private $course_name;

    /**
     * @ORM\Column(type="time")
     */
    private $course_duration;

    /**
     * @ORM\Column(type="integer")
     */
    private $course_price;
    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Professors::class, inversedBy="courses")
     */
    private $professors;
     /**
     * @ORM\Column(type="string", length=100)
     */
    private $figure;
     /**
     * @Vich\UploadableField(mapping="figures", fileNameProperty="figure")
     */
    private $figureFile;
     /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;


    public function __construct()
    {
        $this->professors = new ArrayCollection();
        $this->updatedAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCourseName(): ?string
    {
        return $this->course_name;
    }

    public function setCourseName(string $course_name): self
    {
        $this->course_name = $course_name;

        return $this;
    }

    public function getCourseDuration(): ?\DateTimeInterface
    {
        return $this->course_duration;
    }

    public function setCourseDuration(\DateTimeInterface $course_duration): self
    {
        $this->course_duration = $course_duration;

        return $this;
    }

    public function getCoursePrice(): ?int
    {
        return $this->course_price;
    }

    public function setCoursePrice(int $course_price): self
    {
        $this->course_price = $course_price;

        return $this;
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
        }

        return $this;
    }

    public function removeProfessor(Professors $professor): self
    {
        $this->professors->removeElement($professor);

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
  



    /**
     * Get the value of figure
     */ 
    public function getFigure()
    {
        return $this->figure;
    }

    /**
     * Set the value of figure
     *
     * @return  self
     */ 
    public function setFigure($figure)
    {
        $this->figure = $figure;

        return $this;
    }

    /**
     * Get the value of figureFile
     */ 
    public function getFigureFile()
    {
        return $this->figureFile;
    }

    /**
     * Set the value of figureFile
     *
     * @return  self
     */ 
    public function setFigureFile($figureFile)
    {
        $this->figureFile = $figureFile;
        if($figureFile){
            $this->updatedAt = new \DateTime();
         }
        return $this;
    }

    /**
     * Get the value of updatedAt
     */ 
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @return  self
     */ 
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
