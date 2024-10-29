<?php
require_once 'db_config.php';

// Get all products
function getAllProducts() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM products ORDER BY created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Add new product
function addProduct($name, $description, $price, $image_url) {
    global $pdo;
    $sql = "INSERT INTO products (name, description, price, image_url) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$name, $description, $price, $image_url]);
}

// Delete product
function deleteProduct($id) {
    global $pdo;
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$id]);
}

// Get single product
function getProduct($id) {
    global $pdo;
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Update product
function updateProduct($id, $name, $description, $price, $image_url) {
    global $pdo;
    $sql = "UPDATE products SET name = ?, description = ?, price = ?, image_url = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$name, $description, $price, $image_url, $id]);
}
?>