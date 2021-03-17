<?php

    include('db.inc.php');
    session_start();
    
    $offres_id=$_GET['offres_id'];
    $offre=$mysqli->query('SELECT * FROM `offers` WHERE `id`="'.$offres_id.'"');
    $offre=$offre->fetch_assoc();


    if(isset($_SESSION['user']) && $_SESSION['user']['role']==1){
        if(isset($_POST['job']) && isset($_POST['description']) && isset($_POST['salary']) && ($_POST['job']) != '' && ($_POST['description']) != '' && ($_POST['salary']) != '' ){
            
            $offre=$mysqli->prepare("UPDATE `offers` SET  `job`= ?, `description`= ?, `salary`= ? WHERE `id`=? ");
            $offre->bind_param('sssi',$_POST['job'],$_POST['description'],$_POST['salary'],$_POST['id']);
            $offre->execute();
            header('Location: gestionOffres.php');
            ?>  <div class="alert alert-success" role="alert" style="text-align: center">
                Votre offre a bien été modifiée.
            </div> <?php
        }
    }else{
        ?>    <div class="alert alert-warning" role="alert" style="text-align: center">
                Il faut d'abord vous connecter à un compte admin.
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
    <title>Modifier une offre</title>
</head>
<body>

    <?php include('navBar.php'); ?>
<div style="background-image: url(images/fonddecran2.jpg); height: 861px; background-repeat: no-repeat;background-size: cover;">
    <div class="container" style="text-align:center;">
        <div class="row">
            <div class="col-sm-12" style="height:100px;"></div>
            <div class="col-sm-3"></div>
            <div class="col-sm-6" style="text-align: center;background-color: white; height:650px; border: 2px solid black; border-radius: 10px;">
                <h4>Modifier une offre :</h4>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $offre['id'] ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom du produit</label>
                            <input type="text" class="form-control" name="job" value="<?= $offre['job'] ?>" >
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Salaire</label> 
                            <input type="float" class="form-control" name="salary" value="<?= $offre['salary'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Entrez la description de l'offre</label>
                            <textarea name="description" cols="30" rows="8" class="form-control"><?= $offre['description'] ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier l'offre</button>
                    </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</div>
</body>
</html>