<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

$id = $_GET['id'];
$error = validateProductId($id, $conn);
if ($error) {
    header("Location: error.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $error = validateProductName($name);
    if (!$error) {
        $error = validateProductPrice($price);
    }
    if (!$error) {
        $stmt = $conn->prepare("UPDATE products SET name=:name, price=:price WHERE id=:id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header("Location: index.php");
        exit;
    }
}

$stmt = $conn->prepare("SELECT * FROM products WHERE id=:id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$product = $stmt->fetch();

include 'templates/header.php';
?>

<div class="container">

    <h1>Modifier un produit</h1>

    <form action="update.php?id=<?php echo $product['id']; ?>" method="post">

        <div class="col-4 form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control mb-2" id="name" name="name" value="<?php echo $product['name']; ?>" required>
        </div>

        <div class="col-4 form-group">
            <label for="price">Prix</label>
            <input type="text" class="form-control mb-2" id="price" name="price" value="<?php echo $product['price']; ?>" required>
        </div>
        
        <button type="submit" class="btn btn-primary mt-2">Enregistrer</button>
        <a href="index.php" class="btn btn-secondary mt-2">Annuler</a>
    </form>

</div>

<?php include 'templates/footer.php'; ?>
