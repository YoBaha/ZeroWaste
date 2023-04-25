<?php
    require '../controller/articleC.php';

    $articleC = new articleC();
    $articleC->supprimerarticle($_GET['reference']);
    header('Location:afficherListeArticle.php');
?>