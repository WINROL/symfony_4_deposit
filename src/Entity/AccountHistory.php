<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AccountHistoryRepository")
 * @ORM\Table(name="account_history",
 * indexes={@ORM\Index(name="IDX_ac_h_create_y_m", columns={"create_y_m"})}
 * )
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

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $create_y_m;

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

    public function getCreateYM(): ?string
    {
        return $this->create_y_m;
    }

    public function setCreateYM(string $create_y_m): self
    {
        $this->create_y_m = $create_y_m;

        return $this;
    }
}
