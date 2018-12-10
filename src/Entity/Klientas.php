<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KlientasRepository")
 */
class Klientas implements UserInterface, EquatableInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_Klientas;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vardas;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pavarde;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slaptazodis;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresas;

    /**
     * @ORM\Column(type="datetime")
     */
    private $gimimo_data;

    /**
     * @ORM\Column(type="string", length=20, unique=true)
     */
    private $tel_nr;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $el_pastas;

    /**
     * @ORM\Column(type="integer", length=1)
     */
    private $naujienlaiskiai;

    public function getId(): ?int
    {
        return $this->id_Klientas;
    }

    public function getVardas(): ?string
    {
        return $this->vardas;
    }

    public function setVardas(string $vardas): self
    {
        $this->vardas = $vardas;

        return $this;
    }

    public function getPavarde(): ?string
    {
        return $this->pavarde;
    }

    public function setPavarde(string $pavarde): self
    {
        $this->pavarde = $pavarde;

        return $this;
    }

    public function getSlaptazodis(): ?string
    {
        return $this->slaptazodis;
    }

    public function setSlaptazodis(string $slaptazodis): self
    {
        $this->slaptazodis = $slaptazodis;

        return $this;
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

    public function getGimimoData(): ?\DateTimeInterface
    {
        return $this->gimimo_data;
    }

    public function setGimimoData(\DateTimeInterface $gimimo_data): self
    {
        $this->gimimo_data = $gimimo_data;

        return $this;
    }

    public function getTelNr(): ?string
    {
        return $this->tel_nr;
    }

    public function setTelNr(string $tel_nr): self
    {
        $this->tel_nr = $tel_nr;

        return $this;
    }

    public function getElPastas(): ?string
    {
        return $this->el_pastas;
    }

    public function setElPastas(string $el_pastas): self
    {
        $this->el_pastas = $el_pastas;

        return $this;
    }

    public function getNaujienlaiskiai(): ?int
    {
        return $this->naujienlaiskiai;
    }

    public function setNaujienlaiskiai(int  $naujienlaiskiai): self
    {
        $this->naujienlaiskiai = $naujienlaiskiai;

        return $this;
    }

    public function getUsername()
    {
        return $this->el_pastas;
    }

    public function getPassword()
    {
        return $this->slaptazodis;
    }

    public function getRoles()
    {
        return [
            'ROLE_USER'
        ];
    }

    public function getSalt() 
    {
    }

    public function eraseCredentials()
    {

    }

    public function isEqualTo(UserInterface $user)
    {
        return true;
        
        if ($this->slaptazodis !== $user->getPassword()) {
            return false;
        }

        //if ($this->getSalt()!== $user->getSalt()) {
        //    return false;
        //}

        if ($this->el_pastas !== $user->getUsername()) {
            return false;
        }

    }

    public function serialize()
    {
        return serialize([
            $this->id_Klientas,
            $this->vardas,
            $this->pavarde,
            $this->slaptazodis,
            $this->adresas,
            $this->gimimo_data,
            $this->tel_nr,
            $this->slaptazodis,
            $this->naujienlaiskiai
        ]);
    }

    public function unserialize($string)
    {
        list(
            $this->id_Klientas,
            $this->vardas,
            $this->pavarde,
            $this->slaptazodis,
            $this->adresas,
            $this->gimimo_data,
            $this->tel_nr,
            $this->slaptazodis,
            $this->naujienlaiskiai
        ) = unserialize($string, ['allowed_classes' => false]);
    }
}
