<?php
session_start();
$connecte = false;
if (isset($_SESSION['utilisateur'])) {
    $connecte = true;
}

?>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ZeroWaste</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        $currentPage = $_SERVER['PHP_SELF'];
        ?>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage == '../view/index.php') echo 'active' ?>"
                       aria-current="page" href="../index.php"><i class="fa-solid fa-home"></i> Accueil</a>
                </li>
                
                <?php
                
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($currentPage == '/controller/categories.php') echo 'active' ?>"
                           aria-current="page" href="controller/categories.php"><i
                                    class="fa-brands fa-dropbox"></i> Liste des catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($currentPage == '/controller/produits.php') echo 'active' ?>"
                           aria-current="page" href="../controller/produits.php"><i class="fa-solid fa-tag"></i>
                            Liste des produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($currentPage == '/controller/commandes.php') echo 'active' ?>"
                           aria-current="page" href="controller/commandes.php"><i
                                    class="fa-solid fa-barcode"></i> Commandes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="deconnexion.php"><i
                                    class="fa-solid fa-right-from-bracket"></i> Déconnexion</a>
                    </li>

                    <?php
                
                    ?>
                    
                    <?php
                
                ?>
            </ul>
        </div>
        <a class="btn float-end" href="view/index.php"><i class="fa-solid fa-cart-shopping"></i> Site front</a>
    </div>
</nav>