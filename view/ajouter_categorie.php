<!doctype html>
<html lang="en">
<head>
    <?php include '../view/include/head.php' ?>
    <title>Ajouter catégorie</title>
</head>
<body>
<?php include '../view/include/nav.php' ?>
<div class="container py-2">
    <h4>Ajouter catégorie</h4>
    
    <form method="post" id="myForm" action="add_prod.php">
    <

        <label class="form-label">Libelle</label>
        <input type="text" class="form-control" name="libelle" id="libelle">

        <label class="form-label">Description</label>
        <textarea class="form-control" name="description" id="description"></textarea>

        <span id="error"></span>
        <input type="submit" value="Ajouter catégorie" class="btn btn-primary my-2" name="ajouter" id="ajouter">
    </form>
    <script>
        var myForm = document.getElementById('ajouter');
        var myInput=document.getElementById('libelle');
        var myError=document.getElementById('error');
        myForm.addEventListener('click', f_valid);
        function f_valid(e){
           
            if(myInput.value.trim()==""){
                e.preventDefault();
               myError.textContent="Le champs libelle est obligatoire, merci de saisir le libelle!";
               myError.style.color ="red";

               
            }

        }

</script>


</div>

</body>
</html>