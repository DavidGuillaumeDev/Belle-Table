<?php

  include("db.inc.php");
  session_start();
  $questions=$_SESSION['questions'];
  $offers_id=$_POST['offers_id'];
  $niveau=$_POST['niveau'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>Résultats QCM</title>

</head>
<body>
    <?php include('navBar.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" style="text-align:center">
                <h3>Résultat du QCM</h3>
                <p>Le QCM ayant 10 question et la note étant sur 20, chaque bonne réponse vous rapporte 2 points.</p>
                    <?php 
                    $note=0;
                    $i=0;
                    foreach($questions as $row) {
                        $i=$i+1;?>
                        <h5><?= $row[1] ?> : </h5><br>
                        <h6>Vous avez répondu :</h6>
                        <?php $reponse=$mysqli->query('SELECT * FROM reponses WHERE idr ="'.$_POST['reponse'.$i].'"');
                        $reponse=$reponse->fetch_assoc(); ?>
                        <?=  $reponse['libeller']  ?><br>
                        <?php   if(($reponse['verite'])==1) {  ?>
                                    <h6>Bonne réponse !</h6>
                                    <?php $note=$note+2 ;
                                }
                                if(($reponse['verite'])==0) {  ?>
                                    <h6>Mauvaise réponse, la bonne réponse était :</h6>
                                    <?php $reponseVraie=$mysqli->query('SELECT * FROM reponses WHERE idq ="'.$row[0].'" AND verite = 1');
                                    $reponseVraie=$reponseVraie->fetch_assoc();  ?>
                                    <?= $reponseVraie['libeller'] ?>
                        <?php   }
                    } ?>
                    <h4 style="margin : 20px; color :red;">Votre note totale est de : <?= $note ?>/20</h4>
                    <form action="postuler.php" method="post">
                        <input type="hidden" name="offers_id" value="<?= $offers_id ?>">
                        <input type="hidden" name="note" value="<?= $note ?>">
                        <input type="hidden" name="niveau" value="<?= $niveau ?>">
                        <button type="submit" class="btn btn-primary">Accéder au formulaire</button>
                    </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>