<?php
    include("db.inc.php");

    session_start();
    //Vérification de la connexion à un compte
    if(isset($_SESSION['user'])){
        if(isset($_POST['note']) && isset($_POST['comment']) && isset($_POST['title']) && $_POST['note'] != '' && $_POST['comment'] != '' && $_POST['title'] != ''){
            $note=$_POST['note'];
            $comment=$_POST['comment'];
            $title=$_POST['title'];
            $user_id=$_SESSION['user']['id'];
            if($note==0 || $note==1 || $note==2 || $note==3 || $note==4 || $note==5){
                $result=$mysqli->prepare("INSERT INTO `avis`(`note`,`comment`,`user_id`,`title`) VALUES (?,?,?,?)");
                $result->bind_param('ssis',$note, $comment, $user_id,$title);
                $result->execute();
                ?>  <div class="alert alert-success" role="alert" style="text-align: center">
                        Votre commentaire a bien été envoyé.
                    </div> <?php
            }else{
                ?> <div class="alert alert-warning" role="alert" style="text-align: center">
                Veuillez entrez une note entière entre 0 et 5.
            </div> <?php
            }
        }
    }else{
        ?> <div class="alert alert-warning" role="alert" style="text-align: center">
                Veuillez d'abord vous connecter à un compte client, aucun commentaire ne sera enregistré !
            </div> <?php
    }
        




?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>Votre avis</title>

</head>

<body style="background-image: url(images/fonddecranblanc.jpg);">

    <?php include('navBar.php'); ?>
<div >
    <div class="container">
        <div class="row">
            <div class="col-sm-12" style="height:150px;"></div>
            <div class="col-sm-3"></div>
            <div class="col-sm-6" style="text-align: center; height:520px; ">
                <h4>Laissez-nous un avis</h4>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="note" class="form-label">Note (entre 0 et 5)</label>
                        <input type="number" class="form-control" name="note" min="0" max="5" required>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre</label> 
                        <input type="text" class="form-control" name="title" maxlenght="20" required>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Commentaire</label>
                        <textarea name="comment" cols="30" rows="8" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer le commentaire</button>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
    </div>
    
</body>
</html> 