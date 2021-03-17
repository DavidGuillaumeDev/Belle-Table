<?php
    //Requête de suppression
    include('db.inc.php');
    $offre_id=$_GET['offre_id'];
    $delete=$mysqli->query(' DELETE FROM `offers` WHERE `id`="'.$offre_id.'"');
    header('Location:offresEmploi.php');