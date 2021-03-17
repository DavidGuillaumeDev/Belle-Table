<?php

  include("db.inc.php");
  session_start();
  $offers_id=$_POST['offers_id'];
  $niveau=$_POST['niveau'];
  $questions=$mysqli->query('SELECT * FROM questions WHERE niveau ="'.$niveau.'" ORDER BY rand() limit 10 ');
  $questions=$questions->fetch_all();
  $_SESSION['questions']=$questions;
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>QCM</title>

</head>
<body>
    <?php include('navBar.php'); ?>
    
    <div class="container" style="margin-top : 100px;margin-bottom : 100px">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" style="text-align:center">
                <h3>Bienvenue au QCM</h3>
                <p>Veuillez répondre aux questions ci-dessous, vous pourrez postuler à la fin de celui-ci</p>
                <form action="resultatsQcm.php" method="post">
                    <?php 
                    $i=0;
                    foreach($questions as $row) :
                    $i=$i+1;
                    ?>
                    <h5><?= $row[1] ?> : </h5><br>
                        <?php $reponses=$mysqli->query('SELECT * FROM reponses WHERE idq ="'.$row[0].'"');
                        $reponses=$reponses->fetch_all(); ?>
                        <select name="reponse<?= $i ?>" required>
                        <?php foreach($reponses as $row2) :   ?>
                            <option value="<?= $row2[0] ?>"><?= $row2[2] ?></option>
                        <?php endforeach; ?>
                        </select>
                        <hr>
                    <?php endforeach; ?>
                    <input type="hidden" name="offers_id" value="<?= $offers_id ?>">
                    <input type="hidden" name="niveau" value="<?= $niveau ?>">
                    <input type="submit" class="btn btn-primary" value="Envoyer le QCM">
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

</body>
</html>