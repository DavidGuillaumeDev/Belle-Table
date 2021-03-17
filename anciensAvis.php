<?php
    include("db.inc.php");
    session_start();
    $avis=$mysqli->query('SELECT * FROM avis');
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
    <title>Avis des clients</title>

</head>

<body>

    <?php include('navBar.php'); ?>

    <div style="margin:50px">

    <?php
    //Pour chaque avis trouvé on execute le code suivant :
    foreach($avis->fetch_all() as $row) : ?>
        <?php 
            $user=$mysqli->query('SELECT name,lastname,email FROM users WHERE id=' . $row[1]);
            $user=$user->fetch_assoc();
        ?>
        <div class="col-sm-3" >
            <div class="review-block-name">
                <a href="#">
                <?= $user['name']." ".$user['lastname']; ?>
                </a>
            </div>
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
    

    
</body>
</html> 