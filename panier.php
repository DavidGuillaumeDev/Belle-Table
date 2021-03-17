<?php

  include("db.inc.php");
  session_start();
  //Requête du panier de l'utilisateur connecté
  $panier=$mysqli->query('SELECT * FROM panier WHERE `user_id`="'.$_SESSION['user']['id'].'"');
  $panier=$panier->fetch_all();

    if(isset($_SESSION['user'])){
        
        if(isset($_POST['product_id']) && isset($_POST['user_id']) && isset($_POST['qte'])){
        $result=$mysqli->prepare("INSERT INTO `reservations`(`product_id`,`user_id`,`qte`) VALUES (?,?,?)");
        $result->bind_param('iii',$_POST['product_id'], $_POST['user_id'], $_POST['qte']);
        $result->execute();
        $product_id=$_POST['product_id'];
        $user_id=$_POST['user_id'];
        $delete=$mysqli->query(' DELETE FROM `panier` WHERE `product_id`="'.$product_id.'" AND `user_id` ="'. $user_id.'"');
        ?> 
        <div class="alert alert-success" role="alert" style="text-align: center">
            Votre produit a bien été acheté.
        </div> <?php
        header('Refresh:3 ;panier.php');
        }
    }else{
    ?>    <div class="alert alert-warning" role="alert" style="text-align: center">
            Il faut d'abord vous connecter.
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
    <title>Réservations</title>

</head>

<body style="background-color: #F7F4F3">

<?php include('navBar.php') ?>

<div >
<div class="container" >
    <?php  //Vérifie si la variable est vide
    if(!empty($panier)) :

    
        
        foreach($panier as $row) :
           

            
        $products=$mysqli->query('SELECT * FROM products WHERE `id`="'.$row[2].'"');
        $products=$products->fetch_all();
    ?>
    
    <div class="container">
        <div class="row">
        <hr>
            <div class="col-sm-3">
            <span >
                  <img src="<?= $products[0][3] ?>" alt="" width=300 height=300 />
              </span>
            </div>
            <div class="col-sm-2">
                <b><?= $products[0][1] ?></b> <br> <?= $products[0][2] ?>
            </div>
            <div class="col-sm-5"></div>
            <div class="col-sm-2">
                Quantité : <?= $row[3] ?> <br> 
                <!-- ?product_id=  $products[0][0]  Envoie une valeur dans le lien -->
                <a class="btn btn-danger" href="deletePanierProduct.php?product_id=<?= $products[0][0] ?>&user_id=<?= $_SESSION['user']['id'] ?>" style="text-decoration:none;color: white;"> Supprimer</a>
                <form action="" method="post">
                    <input type="hidden" name="product_id" value="<?=$products[0][0] ?>">
                    <input type="hidden" name="user_id" value="<?=$_SESSION['user']['id'] ?>">
                    <input type="hidden" name="qte" value="<?=$row[3] ?>">
                    <input type="submit" class="btn btn-primary" style="margin-top:5px" value="Acheter le produit">
                </form>
            </div>
        </div>
    </div>
            
    <?php endforeach; ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-5"></div>
            <div class="col-sm-2" style="margin : 50px">
                <a href="buyPanier.php"><input type="button" value="Acheter tout le panier" class="btn btn-primary"></a>
            </div>
            <div class="col-sm-5"></div>
        </div>
    </div>

      
    <?php else : ?>
        <div class="container text-center" >
            <h2>Votre panier est vide. <a href="services.php" style="text-decoration:none;">Aller à la boutique <i class="fas fa-arrow-circle-right"></i></a></h2>
        </div>
    <?php  endif;  ?>  

    </div>     
    </div>

</body>
</html> 