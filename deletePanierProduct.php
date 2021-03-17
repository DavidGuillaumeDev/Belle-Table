<?php

    include('db.inc.php');
    $product_id=$_GET['product_id'];
    $user_id=$_GET['user_id'];
    $delete=$mysqli->query(' DELETE FROM `panier` WHERE `product_id`="'.$product_id.'" AND `user_id` ="'. $user_id.'"');
    header('Location:panier.php');