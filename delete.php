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
    if (isset($_POST['confirmation'])) {
        $stmt = $conn->prepare("DELETE FROM products WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header("Location: index.php");
        exit;
    } else {
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

    <h1>Supprimer un produit</h1>

    <p>Êtes-vous sûr de vouloir supprimer le produit suivant : <strong><?php echo $product['name']; ?></strong></p>

    <form action="delete.php?id=<?php echo $product['id']; ?>" method="post">
        <input type="hidden" name="confirmation" value="1">
        <button type="submit" class="btn btn-danger">Supprimer</button>
        <a href="index.php" class="btn btn-secondary">Annuler</a>
    </form>
    
</div>

<?php include 'templates/footer.php'; ?>
