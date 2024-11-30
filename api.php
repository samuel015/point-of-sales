<?php
header('Content-Type: application/json');
require_once '../controllers/SalesController.php';
require_once '../controllers/InventoryController.php';
require_once '../controllers/CustomerController.php';
require_once '../controllers/SalesReportController.php';

$salesController = new SalesController();
$inventoryController = new InventoryController();
$customerController = new CustomerController();
$salesReportController = new SalesReportController();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['action'])) {
    $data = json_decode(file_get_contents("php://input"));

 if ($_GET['action'] == 'addProduct') {
        $productId = $inventoryController->addProduct($data->name, $data->price, $data->stock, $data->supplier);
        echo json_encode(["product_id" => $productId]);
    }

    if ($_GET['action'] == 'addCustomer') {
        $customerId = $customerController->addCustomer($data->name, $data->email);
        echo json_encode(["customer_id" => $customerId]);
    }

    if ($_GET['action'] == 'createSale') {
        $saleId = $salesController->createSale($data->customer_id, $data->total);
        echo json_encode(["sale_id" => $saleId]);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action'])) {
    if ($_GET['action'] == 'getProducts') {
        $products = $inventoryController->getProducts();
        echo json_encode($products);
    }

    if ($_GET['action'] == 'getCustomers') {
        $customers = $customerController->getCustomers();
        echo json_encode($customers);
    }

    if ($_GET['action'] == 'getSalesReport') {
        $salesReport = $salesReportController->getSalesReport();
        echo json_encode($salesReport);
    }
}
?>
