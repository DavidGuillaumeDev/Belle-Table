<?php

    include('db.inc.php');
    session_start();
    //On recupere le panier de l'utilisateur
    $panier=$mysqli->query('SELECT * FROM `panier` WHERE  `user_id`="'.$_SESSION['user']['id'].'"');
    $panier=$panier->fetch_all();
    var_dump($panier);
    //On insert chaque élement du panier dans reservations
    foreach($panier as $row){
        var_dump($row);
        $result=$mysqli->prepare("INSERT INTO `reservations`(`product_id`,`user_id`,`qte`) VALUES (?,?,?)");
        $result->bind_param('iii',$row[2],$row[1],$row[3]);
        $result->execute();
        $delete=$mysqli->query(' DELETE FROM `panier` WHERE `product_id`="'.$row[2].'" AND `user_id` ="'.$row[1].'"');
    }
    header('Location:panier.php');