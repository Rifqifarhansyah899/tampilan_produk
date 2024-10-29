<?php
require_once 'products.php';
header('Content-Type: application/json');

$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch($action) {
    case 'getAll':
        echo json_encode(getAllProducts());
        break;
        
    case 'add':
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';
        $price = $_POST['price'] ?? 0;
        $image_url = $_POST['image_url'] ?? '';
        
        if(addProduct($name, $description, $price, $image_url)) {
            echo json_encode(['success' => true, 'message' => 'Product added successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to add product']);
        }
        break;
        
    case 'delete':
        $id = $_POST['id'] ?? 0;
        if(deleteProduct($id)) {
            echo json_encode(['success' => true, 'message' => 'Product deleted successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to delete product']);
        }
        break;
        
    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
}
?>