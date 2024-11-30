<?php
include_once 'config/db.php';

class SalesController {
    public function createSale($customer_id, $total) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO sales (customer_id, total) VALUES (?, ?)");
        $stmt->execute([$customer_id, $total]);
        return $conn->lastInsertId();
    }
}
?>
