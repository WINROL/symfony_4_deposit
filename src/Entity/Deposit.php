<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DepositRepository")
 */
class Deposit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Account", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $account;

    /**
     * @ORM\Column(type="decimal", precision=3, scale=1)
     */
    private $percent;

    /**
     * @ORM\Column(type="datetime")
     */
    private $start_dt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $close_dt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccount(): ?Account
    {
        return $this->account;
    }

    public function setAccount(Account $account): self
    {
        $this->account = $account;

        return $this;
    }

    public function getPercent()
    {
        return $this->percent;
    }

    public function setPercent($percent): self
    {
        $this->percent = $percent;

        return $this;
    }

    public function getStartDt(): ?\DateTimeInterface
    {
        return $this->start_dt;
    }

    public function setStartDt(\DateTimeInterface $start_dt): self
    {
        $this->start_dt = $start_dt;

        return $this;
    }

    public function getCloseDt(): ?\DateTimeInterface
    {
        return $this->close_dt;
    }

    public function setCloseDt(\DateTimeInterface $close_dt): self
    {
        $this->close_dt = $close_dt;

        return $this;
    }
}
