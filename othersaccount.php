<?php  
    include("db.inc.php");
    session_start();
    //Vérification accès à cet onglet via des changements de liens
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
    }else{
        $user_id=$_GET['user_id'];
        $user=$mysqli->query('SELECT * FROM users WHERE `id`="'.$user_id.'"');
        $user=$user->fetch_assoc();
    }
    $avis=$mysqli->query('SELECT * FROM avis WHERE `user_id`="'.$user_id.'"');
    $products=$mysqli->query('SELECT * FROM reservations WHERE `user_id`="'.$user_id.'"');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>Mon compte</title>
</head>
<body style="background-image: url(images/fonddecranblanc.jpg);">

    <?php include('navBar.php'); ?>
    
    <div class="container" style="background-color: white;  border: 2px solid black; border-radius: 10px;margin-top : 20px;margin-bottom : 20px">
        <div class="row" style=" padding: 20px;">
            <div class="col-sm-offset-0 col-sm-2 text-center">
                <i class="fas fa-user-circle fa-5x"></i>
            </div>
            <div class="col-sm-10 text-center" style="padding: 20px;">
                <?= $user['name']." ".$user['lastname']."<br>".$user['email'] ?>
            </div>
            <hr>
            <div class="col-sm-offset-0 col-sm-2 text-center" style="padding: 20px;">
                Commandes passées : 
            </div>
            <div class="col-sm-10 text-center" style="padding: 20px;"> 
                
            <?php
            //fetch_all lit les lignes d'un tableau de plusieurs champs
            foreach($products->fetch_all() as $row) : 
            $nameProduct=$mysqli->query('SELECT * FROM products WHERE `id`="'.$row[3].'"');
            $nameProduct=$nameProduct->fetch_assoc(); ?>
        
            <div class="col-sm-3" >
                <div class="review-block-date">  </div>
            </div>
            <div class="col-sm-9">
                <div class="review-block-rate">
                    Produit : <?= $nameProduct['name'] ?><br>
                    Quantité : <?= $row['4'] ?><br>
                    Prix : <?= $nameProduct['price'] ?>€<br>
                    <?php  if(isset($nameProduct)) : ?>
                    <a href="product.php?product_id=<?= $nameProduct['id'] ?>"><button class="btn btn-primary">Aller à la page produit</button></a>
                    <?php endif; ?>
                </div>
            </div>
            <hr>
        <?php endforeach; ?>    
            </div>
            <hr>
            <div class="col-sm-2 text-center" style="padding: 20px;"> 
                Commentaires laissés :
            </div>
            <div class="col-sm-10 " style="padding: 20px;"> 
            <div style="margin:50px">
        
        <?php foreach($avis->fetch_all() as $row) : ?>
            
            <div class="col-sm-3" >
                <div class="review-block-date">  </div>
            </div>
            <div class="col-sm-9">
                <div class="review-block-rate">
                    <?php
                        switch($row[2]):
                            case 0: ?>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="far fa-star"></i>
                                </div>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="far fa-star"></i>
                                </div>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="far fa-star"></i>
                                </div>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="far fa-star"></i>
                                </div>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="far fa-star"></i>
                                </div>
                            <?php break; ?>
                            <?php case 1: ?>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                <i class="fas fa-star"></i>
                                </div> 
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="far fa-star"></i>
                                </div>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="far fa-star"></i>
                                </div>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="far fa-star"></i>
                                </div>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="far fa-star"></i>
                                </div>
                                <?php break; ?>
                            <?php case 2: ?>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="fas fa-star"></i>
                                </div> 
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="fas fa-star"></i>
                                </div>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="far fa-star"></i>
                                </div>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="far fa-star"></i>
                                </div>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="far fa-star"></i>
                                </div> 
                                <?php break; ?>
                            <?php case 3: ?>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="fas fa-star"></i>
                                </div> 
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="fas fa-star"></i>
                                </div>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="fas fa-star"></i>
                                </div>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="far fa-star"></i>
                                </div>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="far fa-star"></i>
                                </div>  
                                <?php break; ?>
                            <?php case 4: ?>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="fas fa-star"></i>
                                </div> 
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="fas fa-star"></i>
                                </div>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="fas fa-star"></i>
                                </div>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="fas fa-star"></i>
                                </div>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="far fa-star"></i>
                                </div> 
                                <?php break; ?>
                            <?php case 5: ?>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="fas fa-star"></i>
                                </div> 
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="fas fa-star"></i>
                                </div>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="fas fa-star"></i>
                                </div>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="fas fa-star"></i>
                                </div>
                                <div style="backgroud-color: yellow;"  class="btn btn-warning btn-xs"  >
                                    <i class="fas fa-star"></i>
                                </div>
                                <?php break; ?>                
                        <?php  endswitch; ?>             
                </div>
                <div class="review-block-title">
                    <h4>
                        <?= $row[5] ?>
                    </h4>
                </div>
                <div class="review-block-description">
                    <?= $row[3] ?>
                </div>
                <div class="review-block-description" style="text-align : centers;">
                    Commentaire ajouté le : <?= $row[4] ?>
                </div>
            </div>
            <hr>
        <?php endforeach; ?>
            
        </div>
            </div>
        </div>
    </div>

</body>
</html>