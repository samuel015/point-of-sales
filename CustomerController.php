<?php
include_once 'config/db.php';

class CustomerController {
    public function addCustomer($name, $email) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO customers (name, email) VALUES (?, ?)");
        $stmt->execute([$name, $email]);
        return $conn->lastInsertId();
    }

    public function getCustomers() {
        global $conn;
        $stmt = $conn->query("SELECT * FROM customers");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
