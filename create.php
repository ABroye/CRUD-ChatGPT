<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

// check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    
    $error = validateProductName($name);
    if (!$error) {
        $error = validateProductPrice($price);
    }
    if (!$error) {
        $stmt = $conn->prepare("INSERT INTO products (name, price) VALUES (:name, :price)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->execute();
        header("Location: index.php");
        exit;
    }
}

include 'templates/header.php';
?>

<div class="container">

    <h1>Ajouter un produit</h1>

    <form action="create.php" method="post">

        <div class="col-4 form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control mb-2" id="name" name="name" required>
        </div>

        <div class="col-4 form-group">
            <label for="price">Prix</label>
            <input type="text" class="form-control mb-2" id="price" name="price" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2 me-2">Ajouter</button>
        <a href="index.php" class="btn btn-secondary mt-2">Retour à la liste des produits</a>

    </form>

    <?php if (isset($error)): ?>

        <div class="alert alert-danger mt-3">
            <?php echo $error; ?>
        </div>

    <?php endif; ?>

</div>

<?php include 'templates/footer.php'; ?>