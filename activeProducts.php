<?php
    session_start();
    //requête pour modifier un champ de la BDD
    include('db.inc.php');
    if($_SESSION['user']['role']==1){
        $product_id=$_GET['product_id'];
        $active=$mysqli->query('UPDATE `products` SET `state`= 1 WHERE `id`="'.$product_id.'"');
        header('Location:gestionProducts.php');
    }else{
        header('Location:index.php');
    }
    