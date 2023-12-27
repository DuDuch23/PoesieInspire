<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ThemeRepository::class)]
class Theme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_theme = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTheme(): ?string
    {
        return $this->nom_theme;
    }

    public function setNomTheme(string $nom_theme): static
    {
        $this->nom_theme = $nom_theme;

        return $this;
    }
}
