<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 * @Vich\Uploadable()
 */
class Student
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
    private $fullname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gender;

    /**
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone_number;

    /**
     * @ORM\ManyToOne(targetEntity="Classe",inversedBy="students")
     */
    private $classe;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $thumbnail;
     /**
     * @Vich\UploadableField(mapping="thumbnails", fileNameProperty="thumbnail")
     */
    private $thumbnailFile;
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

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): self
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getEmailAddress(): ?string
    {
        return $this->email_address;
    }

    public function setEmailAddress(string $email_address): self
    {
        $this->email_address = $email_address;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPhoneNumber(): ?int
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(int $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

   

    /**
     * Get the value of thumbnailFile
     */ 
    public function getThumbnailFile()
    {
        return $this->thumbnailFile;
    }

    /**
     * Set the value of thumbnailFile
     *
     * @return  self
     */ 
    public function setThumbnailFile($thumbnailFile)
    {
        $this->thumbnailFile = $thumbnailFile;
         if($thumbnailFile){
            $this->updatedAt = new \DateTime();
         }
        return $this;
    }

    /**
     * Get the value of thumbnail
     */ 
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * Set the value of thumbnail
     *
     * @return  self
     */ 
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

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
