<?php

    include('db.inc.php');
    session_start();
    if(isset($_SESSION['user']) && $_SESSION['user']['role']==1){
        if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['picture']) && ($_POST['name']) != '' && ($_POST['price']) != '' && ($_POST['description']) != '' && ($_POST['picture']) != ''){
            if(isset($_POST['activation'])){
                if(($_POST['activation'])=='on'){
                    $activation = 1;
                }
            } else {
                $activation = 0;
            }
            $result=$mysqli->prepare("INSERT INTO `products`(`name`,`description`,`url`,`price`,`state`) VALUES (?,?,?,?,?)");
            $result->bind_param('sssdi',$_POST['name'], $_POST['description'], $_POST['picture'],$_POST['price'],$activation);
            $result->execute();
            ?>  <div class="alert alert-success" role="alert" style="text-align: center">
                Votre produit a bien été ajouté.
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
    <title>Ajouter un produit</title>
</head>
<body>

    <?php include('navBar.php'); ?>
<div style="background-image: url(images/fonddecran2.jpg); height: 861px; background-repeat: no-repeat;background-size: cover;">
    <div class="container" style="text-align:center;">
        <div class="row">
            <div class="col-sm-12" style="height:100px;"></div>
            <div class="col-sm-3"></div>
            <div class="col-sm-6" style="text-align: center;background-color: white; height:650px; border: 2px solid black; border-radius: 10px;">
                <h4>Ajouter un produit :</h4>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom du produit</label>
                            <input type="text" class="form-control" name="name"/>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Prix du produit</label> 
                            <input type="float" class="form-control" name="price" >
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Entrez la description de l'article</label>
                            <textarea name="description" cols="30" rows="8" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="picture" class="form-label">Ajouter une photo</label>
                            <input type="text" class="form-control" name="picture" >
                        </div>
                        <div class="mb-3">
                        <input class="form-check-input" type="checkbox" checked id="activation" name="activation">
                        <label class="form-check-label" for="activation">
                            Activer le produit à la création.
                        </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter le produit</button>
                    </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</div>
</body>
</html>