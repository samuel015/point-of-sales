<?php
include_once 'config/db.php';

class InventoryController {
    public function addProduct($name, $price, $stock, $supplier) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO products (name, price, stock, supplier) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $price, $stock, $supplier]);
        return $conn->lastInsertId();
    }

    public function getProducts() {
        global $conn;
        $stmt = $conn->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
