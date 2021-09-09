<?php

namespace App\Entity;

use App\Repository\PlanDetailRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlanDetailRepository::class)
 */
class PlanDetail
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ShoppingPlans::class, inversedBy="planDetails")
     */
    private $shopping_plan_id;

    /**
     * @ORM\ManyToOne(targetEntity=ProductPrice::class, inversedBy="planDetails")
     */
    private $Product_price_id;

    /**
     * @ORM\Column(type="float")
     */
    private $amount;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updated_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShoppingPlanId(): ?ShoppingPlans
    {
        return $this->shopping_plan_id;
    }

    public function setShoppingPlanId(?ShoppingPlans $shopping_plan_id): self
    {
        $this->shopping_plan_id = $shopping_plan_id;

        return $this;
    }

    public function getProductPriceId(): ?ProductPrice
    {
        return $this->Product_price_id;
    }

    public function setProductPriceId(?ProductPrice $Product_price_id): self
    {
        $this->Product_price_id = $Product_price_id;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

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
}
