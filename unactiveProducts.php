<?php

    include('db.inc.php');
    session_start();
    if($_SESSION['user']['role']==1){
        $product_id=$_GET['product_id'];
        $unactive=$mysqli->query('UPDATE `products` SET `state`= 0 WHERE `id`="'.$product_id.'"');
        header('Location:gestionProducts.php');
    }else{
        header('Location:index.php');
    }