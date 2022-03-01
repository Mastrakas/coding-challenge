<?php

namespace App\Entity;

use App\Repository\TechRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TechRepository::class)]
class Tech
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $ninjaName;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNinjaName(): ?string
    {
        return $this->ninjaName;
    }

    public function setNinjaName(string $ninjaName): self
    {
        $this->ninjaName = $ninjaName;

        return $this;
    }
}
