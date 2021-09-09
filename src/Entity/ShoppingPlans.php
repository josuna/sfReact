<?php

namespace App\Entity;

use App\Repository\ShoppingPlansRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShoppingPlansRepository::class)
 */
class ShoppingPlans
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $note;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updated_at;

    /**
     * @ORM\OneToMany(targetEntity=PlanDetail::class, mappedBy="shopping_plan_id")
     */
    private $planDetails;

    public function __construct()
    {
        $this->planDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection|PlanDetail[]
     */
    public function getPlanDetails(): Collection
    {
        return $this->planDetails;
    }

    public function addPlanDetail(PlanDetail $planDetail): self
    {
        if (!$this->planDetails->contains($planDetail)) {
            $this->planDetails[] = $planDetail;
            $planDetail->setShoppingPlanId($this);
        }

        return $this;
    }

    public function removePlanDetail(PlanDetail $planDetail): self
    {
        if ($this->planDetails->removeElement($planDetail)) {
            // set the owning side to null (unless already changed)
            if ($planDetail->getShoppingPlanId() === $this) {
                $planDetail->setShoppingPlanId(null);
            }
        }

        return $this;
    }
}
