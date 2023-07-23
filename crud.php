<?php
include 'connection.php';

// Function to add a new product
function addProduct($name, $description,$image ,$price) {
    global $conn;
    $sql = "INSERT INTO products (name, description,image, price) VALUES ('$name', '$description', '$image','$price')";
    return $conn->query($sql);
}

// Function to fetch all products
function getProducts() {
    global $conn;
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    $products = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    return $products;
}

// Function to update a product
function updateProduct($id, $name, $description,$image, $price) {
    global $conn;
    $sql = "UPDATE products SET name='$name', description='$description',image='$image', price='$price' WHERE id=$id";
    return $conn->query($sql);
}

// Function to delete a product
function deleteProduct($id) {
    global $conn;
    $sql = "DELETE FROM products WHERE id=$id";
    return $conn->query($sql);
}
?>
