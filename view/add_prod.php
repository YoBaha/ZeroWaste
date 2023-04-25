<?php
        if(isset($_POST['ajouter'])){
            //$id = $_POST['id'];
            $libelle = $_POST['libelle'];
            $description = $_POST['description'];
           

            
                
                require_once '../view/include/database.php';
                $sqlState = $pdo->prepare(  'INSERT INTO categorie(libelle,description) VALUES(?,?)');
                 $sqlState->execute([$libelle,$description]);
                header('location: ../controller/categories.php');
            
        }
    ?>