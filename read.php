<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

$id = $_GET['id'];
$error = validateProductId($id, $conn);
if ($error) {
    header("Location: error.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM products WHERE id=:id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$product = $stmt->fetch();

include 'templates/header.php';
?>

<div class="container">
    
    <h1>Détails du produit</h1>

    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th>ID</th>
                <td><?php echo $product['id']; ?></td>
            </tr>
            <tr>
                <th>Nom</th>
                <td><?php echo $product['name']; ?></td>
            </tr>
            <tr>
                <th>Prix</th>
                <td><?php echo $product['price']; ?></td>
            </tr>
        </tbody>
    </table>

    <a href="index.php" class="btn btn-secondary">Retour à la liste des produits</a>
    <a href="update.php?id=<?php echo $product['id']; ?>" class="btn btn-warning">Modifier</a>
    <a href="delete.php?id=<?php echo $product['id']; ?>" class="btn btn-danger">Supprimer</a>

</div>

<?php include 'templates/footer.php'; ?>
