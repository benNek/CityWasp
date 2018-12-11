<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AiksteleRepository")
 */
class Aikstele
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_AIKSTELE;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresas;

    /**
     * @ORM\Column(type="integer")
     */
    private $vietu_sk;

    /**
     * @ORM\Column(type="integer")
     */
    private $laisvu_vietu_sk;

    /**
     * @ORM\Column(type="integer")
     */
    private $fk_IMONEimones_kodas;

    public function getId(): ?int
    {
        return $this->id_AIKSTELE;
    }

    public function getAdresas(): ?string
    {
        return $this->adresas;
    }

    public function setAdresas(string $adresas): self
    {
        $this->adresas = $adresas;

        return $this;
    }

    public function getVietuSk(): ?int
    {
        return $this->vietu_sk;
    }

    public function setVietuSk(int $vietu_sk): self
    {
        $this->vietu_sk = $vietu_sk;

        return $this;
    }

    public function getLaisvuVietuSk(): ?int
    {
        return $this->laisvu_vietu_sk;
    }

    public function setLaisvuVietuSk(int $laisvu_vietu_sk): self
    {
        $this->laisvu_vietu_sk = $laisvu_vietu_sk;

        return $this;
    }

    public function getFkIMONEimonesKodas(): ?int
    {
        return $this->fk_IMONEimones_kodas;
    }

    public function setFkIMONEimonesKodas(int $fk_IMONEimones_kodas): self
    {
        $this->fk_IMONEimones_kodas = $fk_IMONEimones_kodas;

        return $this;
    }
}
