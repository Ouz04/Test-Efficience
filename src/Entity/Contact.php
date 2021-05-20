<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Departement;
use Doctrine\ORM\Mapping as ORM;


class Contact
{
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min="2", max="100")
     */
    private $prenom;
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min="2", max="100")
     */
    private $nom;
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min="10")
     */
    private $message;
    /**
     * @ORM\ManyToOne(targetEntity="Entity\Departement", inversedBy="contacts")
     * @var Departement|null
     */
    private $departement;

    /**
     * @return string|null
     */
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * @param string|null $prenom
     */
    public function setPrenom(?string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string|null
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string|null $nom
     * @return Contact
     */
    public function setNom(?string $nom): Contact
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return Contact
     */
    public function setEmail(?string $email): Contact
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     * @return Contact
     */
    public function setMessage(?string $message): Contact
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return Departement|null
     */
    public function getDepartement(): ?Departement
    {
        return $this->departement;
    }

    /**
     * @param Departement|null $departement
     */
    public function setDepartement(?Departement $departement): void
    {
        $this->departement = $departement;
    }


}
