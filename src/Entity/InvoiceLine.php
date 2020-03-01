<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\InvoiceLineRepository")
 */
class InvoiceLine
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $unit;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $unit_price;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $vat_pourcentage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Invoice", inversedBy="invoiceLines")
     */
    private $Invoice;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUnit(): ?int
    {
        return $this->unit;
    }

    public function setUnit(?int $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function getUnitPrice(): ?float
    {
        return $this->unit_price;
    }

    public function setUnitPrice(?float $unit_price): self
    {
        $this->unit_price = $unit_price;

        return $this;
    }

    public function getVatPourcentage(): ?float
    {
        return $this->vat_pourcentage;
    }

    public function setVatPourcentage(?float $vat_pourcentage): self
    {
        $this->vat_pourcentage = $vat_pourcentage;

        return $this;
    }

    public function getInvoice(): ?Invoice
    {
        return $this->Invoice;
    }

    public function setInvoice(?Invoice $Invoice): self
    {
        $this->Invoice = $Invoice;

        return $this;
    }
}
