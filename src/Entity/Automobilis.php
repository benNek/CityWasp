<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AutomobilisRepository")
 */
class Automobilis
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_AUTOMOBILIS;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $valstybinis_nr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modelis;

    /**
     * @ORM\Column(type="date")
     */
    private $pagaminimo_metai;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $kuras;

    /**
     * @ORM\Column(type="integer")
     */
    private $duru_skaicius;

    /**
     * @ORM\Column(type="float")
     */
    private $variklis;

    /**
     * @ORM\Column(type="integer")
     */
    private $vietu_skaicius;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $minutes_kaina;

    /**
     * @ORM\Column(type="integer")
     */
    private $pavaru_deze;

    /**
     * @ORM\Column(type="integer")
     */
    private $fk_marke;

    /**
     * @ORM\Column(type="integer")
     */
    private $fk_AIKSTELEaiksteles_id;

    public function getId(): ?int
    {
        return $this->id_AUTOMOBILIS;
    }

    public function getValstybinisNr(): ?string
    {
        return $this->valstybinis_nr;
    }

    public function setValstybinisNr(string $valstybinis_nr): self
    {
        $this->valstybinis_nr = $valstybinis_nr;

        return $this;
    }

    public function getModelis(): ?string
    {
        return $this->modelis;
    }

    public function setModelis(string $modelis): self
    {
        $this->modelis = $modelis;

        return $this;
    }

    public function getPagaminimoMetai(): ?\DateTimeInterface
    {
        return $this->pagaminimo_metai;
    }

    public function setPagaminimoMetai(\DateTimeInterface $pagaminimo_metai): self
    {
        $this->pagaminimo_metai = $pagaminimo_metai;

        return $this;
    }

    public function getKuras(): ?string
    {
        return $this->kuras;
    }

    public function setKuras(string $kuras): self
    {
        $this->kuras = $kuras;

        return $this;
    }

    public function getDuruSkaicius(): ?int
    {
        return $this->duru_skaicius;
    }

    public function setDuruSkaicius(int $duru_skaicius): self
    {
        $this->duru_skaicius = $duru_skaicius;

        return $this;
    }

    public function getVariklis(): ?float
    {
        return $this->variklis;
    }

    public function setVariklis(float $variklis): self
    {
        $this->variklis = $variklis;

        return $this;
    }

    public function getVietuSkaicius(): ?int
    {
        return $this->vietu_skaicius;
    }

    public function setVietuSkaicius(int $vietu_skaicius): self
    {
        $this->vietu_skaicius = $vietu_skaicius;

        return $this;
    }

    public function getMinutesKaina()
    {
        return $this->minutes_kaina;
    }

    public function setMinutesKaina($minutes_kaina): self
    {
        $this->minutes_kaina = $minutes_kaina;

        return $this;
    }

    public function getPavaruDeze(): ?int
    {
        return $this->pavaru_deze;
    }

    public function setPavaruDeze(int $pavaru_deze): self
    {
        $this->pavaru_deze = $pavaru_deze;

        return $this;
    }

    public function getFkMarke(): ?int
    {
        return $this->fk_marke;
    }

    public function setFkMarke(int $fk_marke): self
    {
        $this->fk_marke = $fk_marke;

        return $this;
    }

    public function getFkAIKSTELEaikstelesId(): ?int
    {
        return $this->fk_AIKSTELEaiksteles_id;
    }

    public function setFkAIKSTELEaikstelesId(int $fk_AIKSTELEaiksteles_id): self
    {
        $this->fk_AIKSTELEaiksteles_id = $fk_AIKSTELEaiksteles_id;

        return $this;
    }
}
