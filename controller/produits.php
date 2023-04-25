<!doctype html>
<html lang="en">
<head>
    <?php include '../view/include/head.php' ?>
    <title>Liste des produits</title>
</head>
<body>
<?php include '../view/include/nav.php' ?>
<div class="container py-2">
    <h2>Liste des produits</h2>
    <a href="../view/ajouter_produit.php" class="btn btn-primary">Ajouter produit</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Identifiant</th>
                <th>Libelle</th>
                <th>Prix</th>
                <th>Discount</th>
                <th>Catégorie</th>
                <th>Image</th>
                <th>Date de création</th>
                <th>Opérations</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require_once '../view/include/database.php';
        $produits = $pdo->query("SELECT * FROM produit ORDER BY date_creation DESC")->fetchAll(PDO::FETCH_OBJ);
        foreach ($produits as $produit){
            $prix = $produit->prix;
            $discount = $produit->discount;
            $prixFinale = $prix - (($prix*$discount)/100);
            ?>
            <tr>
                <td><?= $produit->id ?></td>
                <td><?= $produit->libelle ?></td>
                <td><?= $produit->prix ?> <i class="fa fa-solid fa-dollar"></i></td>
                <td><?= $produit->discount ?> %</td>
                <td><?= $produit->id_categorie ?></td>
                <td><img class="img-fluid" width="90" src="upload/produit/<?= $produit->image ?>" alt="<?= $produit->libelle ?>"></td>
                <td><?= $produit->date_creation ?></td>
                <td>
                    <a class="btn btn-primary" href="../view/modifier_produit.php?id=<?php echo $produit->id ?>">Modifier</a>
                    <a class="btn btn-danger" href="../view/supprimer_produit.php?id=<?php echo $produit->id ?>" onclick="return confirm('Voulez vous vraiment supprimer le produit <?php echo $produit->libelle?> ?')">Supprimer</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>