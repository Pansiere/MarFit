<?php

namespace Pansiere\MarFit\Repositories;

use Pansiere\MarFit\Models\Product;
use PDO;

class ProductRepository
{
    /**
     * @param PDO $pdo
     */
    public function __construct(
        private PDO $pdo
    ) {}

    private function createProductObject(array $data): Product
    {
        return new Product(
            $data['id'],
            $data['type'],
            $data['name'],
            $data['description'],
            (float) $data['price'],
            (int) $data['quantity'],
            $data['image'] ?? null
        );
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM products ORDER BY price";
        $statement = $this->pdo->query($sql);
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map([$this, 'createProductObject'], $data);
    }

    public function delete(int $id): void
    {
        $sql = "DELETE FROM products WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public function save(Product $product): void
    {
        $sql = "INSERT INTO products (type, name, description, price, quantity, image) VALUES (?, ?, ?, ?, ?, ?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $product->getType());
        $statement->bindValue(2, $product->getName());
        $statement->bindValue(3, $product->getDescription());
        $statement->bindValue(4, $product->getPrice());
        $statement->bindValue(5, $product->getQuantity());
        $statement->bindValue(6, $product->getImage());
        $statement->execute();
    }

    public function find(int $id): ?Product
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();

        $data = $statement->fetch(PDO::FETCH_ASSOC);

        return $data ? $this->createProductObject($data) : null;
    }

    public function update(int $id, string $type, string $name, string $description, int $quantity, float $price): void
    {
        $sql = "UPDATE products SET type = ?, name = ?, description = ?, price = ?, quantity = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $type);
        $statement->bindValue(2, $name);
        $statement->bindValue(3, $description);
        $statement->bindValue(4, $price);
        $statement->bindValue(5, $quantity, PDO::PARAM_INT);
        $statement->bindValue(6, $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public function updateWithImage(int $id, string $type, string $name, string $description, int $quantity, float $price, string $imageName): void
    {
        $sql = "UPDATE products SET type = ?, name = ?, description = ?, price = ?, quantity = ?, image = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $type);
        $statement->bindValue(2, $name);
        $statement->bindValue(3, $description);
        $statement->bindValue(4, $price);
        $statement->bindValue(5, $quantity);
        $statement->bindValue(6, $imageName);
        $statement->bindValue(7, $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public function findCoffeeOptions(): array
    {
        $sql = "SELECT * FROM products WHERE type = 'Coffee' ORDER BY price";
        $statement = $this->pdo->query($sql);
        $coffeeProducts = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map([$this, 'createProductObject'], $coffeeProducts);
    }

    public function findLunchOptions(): array
    {
        $sql = "SELECT * FROM products WHERE type = 'Lunch' ORDER BY price";
        $statement = $this->pdo->query($sql);
        $lunchProducts = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map([$this, 'createProductObject'], $lunchProducts);
    }
}
