<?php

namespace App\Entity;

use App\Repository\AboutpageRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=AboutpageRepository::class)
 * @Vich\Uploadable()
 */
class Aboutpage
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
     * @ORM\Column(type="string", length=1000)
     */
    private $description;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $view;
     /**
     * @Vich\UploadableField(mapping="views", fileNameProperty="view")
     */
    private $viewFile;
    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    public function __construct(){
        $this->updatedAt = new \DateTime();
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
     * Get the value of view
     */ 
    public function getView()
    {
        return $this->view;
    }

    /**
     * Set the value of view
     *
     * @return  self
     */ 
    public function setView($view)
    {
        $this->view = $view;

        return $this;
    }

    /**
     * Get the value of viewFile
     */ 
    public function getViewFile()
    {
        return $this->viewFile;
    }

    /**
     * Set the value of viewFile
     *
     * @return  self
     */ 
    public function setViewFile($viewFile)
    {
        $this->viewFile = $viewFile;
        if($viewFile){
           $this->updatedAt = new \DateTime();
        }
       return $this;
    }

    /**
     * Get the value of updatedAt
     */ 
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

  
    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
