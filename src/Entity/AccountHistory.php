<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AccountHistoryRepository")
 */
class AccountHistory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="bigint")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Account")
     * @ORM\JoinColumn(nullable=false)
     */
    private $account;

    /**
     * @ORM\Column(type="decimal", precision=9, scale=2)
     */
    private $sum;

    /**
     * @ORM\Column(type="datetime")
     */
    private $create_dt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccount(): ?Account
    {
        return $this->account;
    }

    public function setAccount(?Account $account): self
    {
        $this->account = $account;

        return $this;
    }

    public function getSum()
    {
        return $this->sum;
    }

    public function setSum($sum): self
    {
        $this->sum = $sum;

        return $this;
    }

    public function getCreateDt(): ?\DateTimeInterface
    {
        return $this->create_dt;
    }

    public function setCreateDt(\DateTimeInterface $create_dt): self
    {
        $this->create_dt = $create_dt;

        return $this;
    }
}
