<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UzsakymasRepository")
 */
class Uzsakymas
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_UZSAKYMAS;

    /**
     * @ORM\Column(type="datetime")
     */
    private $paemimo_data;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $grazinimo_data;

    /**
     * @ORM\Column(type="integer")
     */
    private $uzsakymo_busena;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $fk_DARBUOTOJASdarbuotojo_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $fk_AUTOMOBILISid_AUTOMOBILIS;

    /**
     * @ORM\Column(type="integer")
     */
    private $fk_KLIENTAS;

    public function getUzsakymasId(): ?int
    {
        return $this->id_UZSAKYMAS;
    }


    public function getPaemimoData(): ?\DateTimeInterface
    {
        return $this->paemimo_data;
    }

    public function setPaemimoData(\DateTimeInterface $paemimo_data): self
    {
        $this->paemimo_data = $paemimo_data;

        return $this;
    }

    public function getGrazinimoData(): ?\DateTimeInterface
    {
        return $this->grazinimo_data;
    }

    public function setGrazinimoData(?\DateTimeInterface $grazinimo_data): self
    {
        $this->grazinimo_data = $grazinimo_data;

        return $this;
    }

    public function getUzsakymoBusena(): ?int
    {
        return $this->uzsakymo_busena;
    }

    public function setUzsakymoBusena(int $uzsakymo_busena): self
    {
        $this->uzsakymo_busena = $uzsakymo_busena;

        return $this;
    }

    public function getDarbuotojoId(): ?int
    {
        return $this->fk_DARBUOTOJASdarbuotojo_id;
    }

    public function setDarbuotojoId(?int $darbuotojo_id): self
    {
        $this->fk_DARBUOTOJASdarbuotojo_id = $darbuotojo_id;

        return $this;
    }

    public function getAutomobilioId(): ?int
    {
        return $this->fk_AUTOMOBILISid_AUTOMOBILIS;
    }

    public function setAutomobilioId(int $automobilio_id): self
    {
        $this->fk_AUTOMOBILISid_AUTOMOBILIS = $automobilio_id;

        return $this;
    }

    public function getKlientoId(): ?int
    {
        return $this->fk_KLIENTAS;
    }

    public function setKlientoId(int $kliento_id): self
    {
        $this->fk_KLIENTAS = $kliento_id;

        return $this;
    }
}
