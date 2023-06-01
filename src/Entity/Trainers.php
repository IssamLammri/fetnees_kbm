<?php

namespace App\Entity;

use App\Repository\TrainersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrainersRepository::class)]
class Trainers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $trainerFullName = null;

    #[ORM\Column(length: 100)]
    private ?string $trainerRank = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $facebookLink = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $instegramLink = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrainerFullName(): ?string
    {
        return $this->trainerFullName;
    }

    public function setTrainerFullName(string $trainerFullName): self
    {
        $this->trainerFullName = $trainerFullName;

        return $this;
    }

    public function getTrainerRank(): ?string
    {
        return $this->trainerRank;
    }

    public function setTrainerRank(string $trainerRank): self
    {
        $this->trainerRank = $trainerRank;

        return $this;
    }

    public function getFacebookLink(): ?string
    {
        return $this->facebookLink;
    }

    public function setFacebookLink(?string $facebookLink): self
    {
        $this->facebookLink = $facebookLink;

        return $this;
    }

    public function getInstegramLink(): ?string
    {
        return $this->instegramLink;
    }

    public function setInstegramLink(?string $instegramLink): self
    {
        $this->instegramLink = $instegramLink;

        return $this;
    }
}
