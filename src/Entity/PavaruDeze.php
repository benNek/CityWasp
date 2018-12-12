<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PavaruDezeRepository")
 */
class PavaruDeze
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id_PAVARU_DEZE;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function getIdPAVARUDEZE(): ?int
    {
        return $this->id_PAVARU_DEZE;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
