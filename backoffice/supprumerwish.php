<?php 

include_once 'config.php';
include_once 'wishC.php';


$hotelc=new wishC();

$prod=$hotelc->supprimerwich_list($_POST['id_wich']);


header('location:http://localhost/mycartcode/backoffice/affichewich.php');

?>


