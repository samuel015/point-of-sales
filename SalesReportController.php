<?php
include_once 'config/db.php';

class SalesReportController {
    public function getSalesReport() {
        global $conn;
        $stmt = $conn->query("SELECT s.id, s.total, s.created_at, c.name AS customer_name FROM sales s JOIN customers c ON s.customer_id = c.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
