<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DarbuotojasRepository")
 */
class Darbuotojas
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_DARBUOTOJAS;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vardas;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pavarde;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $tel_nr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $el_pastas;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresas;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $role;
    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $darbopradzia;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $darbopabaiga;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVardas(): ?string
    {
        return $this->vardas;
    }

    public function setVardas(?string $vardas): self
    {
        $this->vardas = $vardas;

        return $this;
    }

    public function getPavarde(): ?string
    {
        return $this->pavarde;
    }

    public function setPavarde(?string $pavarde): self
    {
        $this->pavarde = $pavarde;

        return $this;
    }

    public function getTelNr(): ?string
    {
        return $this->tel_nr;
    }

    public function setTelNr(?string $tel_nr): self
    {
        $this->tel_nr = $tel_nr;

        return $this;
    }

    public function getElPastas(): ?string
    {
        return $this->el_pastas;
    }

    public function setElPastas(?string $el_pastas): self
    {
        $this->el_pastas = $el_pastas;

        return $this;
    }

    public function getAdresas(): ?string
    {
        return $this->adresas;
    }

    public function setAdresas(?string $adresas): self
    {
        $this->adresas = $adresas;

        return $this;
    }

    public function getIdDARBUOTOJAS(): ?int
    {
        return $this->id_DARBUOTOJAS;
    }

    public function setIdDARBUOTOJAS(int $id_DARBUOTOJAS): self
    {
        $this->id_DARBUOTOJAS = $id_DARBUOTOJAS;

        return $this;
    }

    public function getDarboPradzia(): ?\DateTimeInterface
    {
        return $this->darbopradzia;
    }

    public function setDarboPradzia(?\DateTimeInterface $darbopradzia): self
    {
        $this->darbopradzia = $darbopradzia;

        return $this;
    }

    public function getDarboPabaiga(): ?\DateTimeInterface
    {
        return $this->darbopabaiga;
    }

    public function setDarboPabaiga(?\DateTimeInterface $darbopabaiga): self
    {
        $this->darbopabaiga = $darbopabaiga;

        return $this;
    }
    public function getRole(): ?int
    {
        return $this->role;
    }
    public function setRole(int $role):self
    {
        $this->role = $role;
        return $this;
    }
}
