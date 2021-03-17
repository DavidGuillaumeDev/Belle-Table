<?php

    include('db.inc.php');
    session_start();
    
    $product_id=$_GET['product_id'];
    $product=$mysqli->query('SELECT * FROM `products` WHERE `id`="'.$product_id.'"');
    $product=$product->fetch_assoc();


    if(isset($_SESSION['user']) && $_SESSION['user']['role']==1){
        if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['picture']) && ($_POST['name']) != '' && ($_POST['price']) != '' && ($_POST['description']) != '' && ($_POST['picture']) != ''){
            
            $product=$mysqli->prepare("UPDATE `products` SET  `name`= ?, `description`= ?, `url`= ?, `price`= ? WHERE `id`=? ");
            $product->bind_param('ssssi',$_POST['name'],$_POST['description'],$_POST['picture'],$_POST['price'],$_POST['id']);
            $product->execute();
            header('Location: gestionProducts.php');
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
    <title>Modifier un produit</title>
</head>
<body>

    <?php include('navBar.php'); ?>
<div style="background-image: url(images/fonddecran2.jpg); height: 861px; background-repeat: no-repeat;background-size: cover;">
    <div class="container" style="text-align:center;">
        <div class="row">
            <div class="col-sm-12" style="height:100px;"></div>
            <div class="col-sm-3"></div>
            <div class="col-sm-6" style="text-align: center;background-color: white; height:650px; border: 2px solid black; border-radius: 10px;">
                <h4>Modifier un produit :</h4>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $product['id'] ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom du produit</label>
                            <input type="text" class="form-control" name="name" value="<?= $product['name'] ?>" >
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Prix du produit</label> 
                            <input type="float" class="form-control" name="price" value="<?= $product['price'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Entrez la description de l'article</label>
                            <textarea name="description" cols="30" rows="8" class="form-control"><?= $product['description'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="picture" class="form-label">Ajouter une photo</label>
                            <input type="text" class="form-control" name="picture" value="<?= $product['url'] ?>" >
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier le produit</button>
                    </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</div>
</body>
</html>