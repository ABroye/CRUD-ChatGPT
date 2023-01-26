<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

$products = getAllProducts($conn);

include 'templates/header.php';
?>

<div class="container">

    <h1>Liste des produits</h1>

    <table class="table table-bordered table-striped">

        <thead>
            <tr class="table-primary">
                <th>ID</th>
                <th>Nom</th>
                <th>Prix</th>
                <th class="d-flex justify-content-end">Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($products as $product) { ?>
                <tr class="align-middle">
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td class="d-flex justify-content-end">
                        <a href="read.php?id=<?php echo $product['id']; ?>" class="btn btn-info me-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Voir"><i class="bi bi-eye"></i></a>
                        <a href="update.php?id=<?php echo $product['id']; ?>" class="btn btn-warning me-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Modifier"><i class="bi bi-pencil-square"></i></a>
                        <a href="delete.php?id=<?php echo $product['id']; ?>" class="btn btn-danger me-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Supprimer"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>

    <a href="create.php" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Ajouter un produit">Créer un nouveau produit</a>
    
</div>

<?php include 'templates/footer.php'; ?>