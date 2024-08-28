<?php

namespace Pansiere\MarFit\Models;

class Product
{
    public function __construct(
        private ?int $id,
        private string $type,
        private string $name,
        private string $description,
        private float $price,
        private int $quantity,
        private ?string $image = null
    ) {
        $this->id = $id;
        $this->type = $type;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->image = $image;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getImage(): string
    {
        return $this->image ?? '';
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getImageDirectory(): string
    {
        return 'img/' . $this->image;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
    public function getFormattedPrice(): string
    {
        return "R$ " . number_format($this->price, 2);
    }
}
