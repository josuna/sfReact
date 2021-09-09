<?php

namespace App\Entity;

use App\Repository\ProductPriceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductPriceRepository::class)
 */
class ProductPrice
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="productPrices")
     */
    private $product_id;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity=Supplier::class, inversedBy="productPrices")
     */
    private $supplier_id;

    /**
     * @ORM\OneToMany(targetEntity=PlanDetail::class, mappedBy="Product_price_id")
     */
    private $planDetails;

    /**
     * @ORM\OneToMany(targetEntity=InvoiceDetail::class, mappedBy="product_price_id")
     */
    private $invoiceDetails;

    public function __construct()
    {
        $this->planDetails = new ArrayCollection();
        $this->invoiceDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getProductId(): ?Product
    {
        return $this->product_id;
    }

    public function setProductId(?Product $product_id): self
    {
        $this->product_id = $product_id;

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

    public function getSupplierId(): ?Supplier
    {
        return $this->supplier_id;
    }

    public function setSupplierId(?Supplier $supplier_id): self
    {
        $this->supplier_id = $supplier_id;

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
            $planDetail->setProductPriceId($this);
        }

        return $this;
    }

    public function removePlanDetail(PlanDetail $planDetail): self
    {
        if ($this->planDetails->removeElement($planDetail)) {
            // set the owning side to null (unless already changed)
            if ($planDetail->getProductPriceId() === $this) {
                $planDetail->setProductPriceId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|InvoiceDetail[]
     */
    public function getInvoiceDetails(): Collection
    {
        return $this->invoiceDetails;
    }

    public function addInvoiceDetail(InvoiceDetail $invoiceDetail): self
    {
        if (!$this->invoiceDetails->contains($invoiceDetail)) {
            $this->invoiceDetails[] = $invoiceDetail;
            $invoiceDetail->setProductPriceId($this);
        }

        return $this;
    }

    public function removeInvoiceDetail(InvoiceDetail $invoiceDetail): self
    {
        if ($this->invoiceDetails->removeElement($invoiceDetail)) {
            // set the owning side to null (unless already changed)
            if ($invoiceDetail->getProductPriceId() === $this) {
                $invoiceDetail->setProductPriceId(null);
            }
        }

        return $this;
    }
}
