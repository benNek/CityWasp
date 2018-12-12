<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarFilterRepository")
 */
class CarFilter
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $marke;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pavaru_deze;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $metai_nuo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $metai_iki;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $kaina_nuo;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $kaina_iki;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarke(): ?int
    {
        return $this->marke;
    }

    public function setMarke(?int $marke): self
    {
        $this->marke = $marke;

        return $this;
    }

    public function getPavaruDeze(): ?int
    {
        return $this->pavaru_deze;
    }

    public function setPavaruDeze(?int $pavaru_deze): self
    {
        $this->pavaru_deze = $pavaru_deze;

        return $this;
    }

    public function getMetaiNuo(): ?int
    {
        return $this->metai_nuo;
    }

    public function setMetaiNuo(?int $metai_nuo): self
    {
        $this->metai_nuo = $metai_nuo;

        return $this;
    }

    public function getMetaiIki(): ?int
    {
        return $this->metai_iki;
    }

    public function setMetaiIki(?int $metai_iki): self
    {
        $this->metai_iki = $metai_iki;

        return $this;
    }

    public function getKainaNuo(): ?int
    {
        return $this->kaina_nuo;
    }

    public function setKainaNuo(?int $kaina_nuo): self
    {
        $this->kaina_nuo = $kaina_nuo;

        return $this;
    }

    public function getKainaIki()
    {
        return $this->kaina_iki;
    }

    public function setKainaIki($kaina_iki): self
    {
        $this->kaina_iki = $kaina_iki;

        return $this;
    }
}
