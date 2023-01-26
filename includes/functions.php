<?php

// Fonction pour ajouter un produit
function addProduct($name, $price, $conn) {
    $stmt = $conn->prepare("INSERT INTO products (name, price) VALUES (:name, :price)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->execute();
}

// Fonction pour afficher tous les produits
function getAllProducts($conn) {
    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
}

// Fonction pour mettre à jour un produit
function updateProduct($id, $name, $price, $conn) {
    $stmt = $conn->prepare("UPDATE products SET name=:name, price=:price WHERE id=:id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

// Fonction pour supprimer un produit
function deleteProduct($id, $conn) {
    $stmt = $conn->prepare("DELETE FROM products WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

// Validation du nom du produit
function validateProductName($name) {
    if (strlen($name) < 3) {
        return "Le nom du produit doit comporter au moins 3 caractères.";
    }
    if (strlen($name) > 255) {
        return "Le nom du produit ne doit pas dépasser 255 caractères.";
    }
    return '';
}

// Validation du prix du produit
function validateProductPrice($price) {
    if (!is_numeric($price)) {
        return "Le prix doit être un nombre.";
    }
    if ($price <= 0) {
        return "Le prix doit être supérieur à 0.";
    }
    return '';
}

// Validation de l'ID du produit
function validateProductId($id, $conn) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $product = $stmt->fetch();
    if (!$product) {
        return "L'ID du produit n'est pas valide.";
    }
    return '';
}

?>