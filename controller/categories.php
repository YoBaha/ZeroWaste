<!doctype html>
<html lang="en">
<head>
    <?php include '../view/include/head.php' ?>
    <title>Liste des catégories</title>
</head>
<body>
<?php include '../view/include/nav.php' ?>
<div class="container py-2">
    <h2>Liste des catégories</h2>
    <a href="../view/ajouter_categorie.php" class="btn btn-primary">Ajouter catégorie</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Libelle</th>
                <th>Description</th>
                <th>Date</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
        require_once '../view/include/database.php';
        $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
        foreach ($categories as $categorie){
            ?>
            <tr>
                <td><?php echo $categorie['id'] ?></td>
                <td><?php echo $categorie['libelle'] ?></td>
                <td><?php echo $categorie['description'] ?></td>
                
                <td><?php echo $categorie['date_creation'] ?></td>
                <td>
                    <a href="../view/modifier_categorie.php?id=<?php echo $categorie['id'] ?>" class="btn btn-primary">Modifier</a>
                    <a href="../view/supprimer_categorie.php?id=<?php echo $categorie['id'] ?>" onclick="return confirm('Voulez vous vraiment supprimer la catégorie <?php echo $categorie['libelle'] ?>');" class="btn btn-danger">Supprimer</a>
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