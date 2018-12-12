<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SaskaitaRepository")
 */
class Saskaita
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_SASKAITA;

    /**
     * @ORM\Column(type="float")
     */
    private $suma;

    /**
     * @ORM\Column(type="datetime")
     */
    private $data;

    /**
     * @ORM\Column(type="integer")
     */
    private $fk_UZSAKYMASuzsakymo_id;

    public function getId(): ?int
    {
        return $this->id_SASKAITA;
    }

    public function getSuma(): ?float
    {
        return $this->suma;
    }

    public function setSuma(float $suma): self
    {
        $this->suma = $suma;

        return $this;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getFkUZSAKYMASuzsakymoId(): ?int
    {
        return $this->fk_UZSAKYMASuzsakymo_id;
    }

    public function setFkUZSAKYMASuzsakymoId(int $fk_UZSAKYMASuzsakymo_id): self
    {
        $this->fk_UZSAKYMASuzsakymo_id = $fk_UZSAKYMASuzsakymo_id;

        return $this;
    }
}
