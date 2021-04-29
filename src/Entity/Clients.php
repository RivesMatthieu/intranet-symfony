<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;

/**
 * @ORM\Entity(repositoryClass=ClientsRepository::class)
 */
class Clients
{
    const TMA = [
        0 => 'Non',
        1 => 'Oui'
    ];

    const SEO = [
        0 => 'Non',
        1 => 'Oui'
    ];

    const SEA = [
        0 => 'Non',
        1 => 'Oui'
    ];

    const ACTIF = [
        0 => 'Non',
        1 => 'Oui'
    ];

    const UNIWEB = [
        0 => 'Non',
        1 => 'Oui'
    ];

    const HACK = [
        0 => 'Non',
        1 => 'Oui'
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Site;

    /**
     * @ORM\Column(type="integer")
     */
    private $Actif;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Societe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Contact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Role;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Email;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Telephone;

    /**
     * @ORM\Column(type="integer")
     */
    private $Uniweb;

    /**
     * @ORM\Column(type="integer")
     */
    private $TMA;

    /**
     * @ORM\Column(type="integer")
     */
    private $Seo;

    /**
     * @ORM\Column(type="integer")
     */
    private $Sea;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Cms;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $AdminUrl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $AdminAcces;

    /**
     * @ORM\Column(type="integer")
     */
    private $Hack;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return (new Slugify())->slugify($this->Site);
    }

    public function getSite(): ?string
    {
        return $this->Site;
    }

    public function setSite(string $Site): self
    {
        $this->Site = $Site;

        return $this;
    }

    public function getActif(): ?int
    {
        return $this->Actif;
    }

    public function setActif(int $Actif): self
    {
        $this->Actif = $Actif;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->Url;
    }

    public function setUrl(string $Url): self
    {
        $this->Url = $Url;

        return $this;
    }

    public function getSociete(): ?string
    {
        return $this->Societe;
    }

    public function setSociete(string $Societe): self
    {
        $this->Societe = $Societe;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->Contact;
    }

    public function setContact(?string $Contact): self
    {
        $this->Contact = $Contact;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->Role;
    }

    public function setRole(?string $Role): self
    {
        $this->Role = $Role;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(?string $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getUniweb(): ?int
    {
        return $this->Uniweb;
    }

    public function setUniweb(int $Uniweb): self
    {
        $this->Uniweb = $Uniweb;

        return $this;
    }

    public function getTMA(): ?int
    {
        return $this->TMA;
    }

    public function setTMA(int $TMA): self
    {
        $this->TMA = $TMA;

        return $this;
    }

    public function getSeo(): ?int
    {
        return $this->Seo;
    }

    public function setSeo(?int $Seo): self
    {
        $this->Seo = $Seo;

        return $this;
    }

    public function getSea(): ?int
    {
        return $this->Sea;
    }

    public function setSea(?int $Sea): self
    {
        $this->Sea = $Sea;

        return $this;
    }

    public function getCms(): ?string
    {
        return $this->Cms;
    }

    public function setCms(?string $Cms): self
    {
        $this->Cms = $Cms;

        return $this;
    }

    public function getAdminUrl(): ?string
    {
        return $this->AdminUrl;
    }

    public function setAdminUrl(?string $AdminUrl): self
    {
        $this->AdminUrl = $AdminUrl;

        return $this;
    }

    public function getAdminAcces(): ?string
    {
        return $this->AdminAcces;
    }

    public function setAdminAcces(?string $AdminAcces): self
    {
        $this->AdminAcces = $AdminAcces;

        return $this;
    }

    public function getHack(): ?int
    {
        return $this->Hack;
    }

    public function setHack(?int $Hack): self
    {
        $this->Hack = $Hack;

        return $this;
    }
}
