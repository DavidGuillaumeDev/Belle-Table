<?php

include("db.inc.php");

//function que l'on pourra appeler plusieurs fois en incluant cette page
function searchProduct($s, $mysqli){
    $search=$mysqli->query("SELECT * FROM `products` WHERE `name` LIKE '%$s%' AND `state`=1 ");
    $search=$search->fetch_all();
    return $search;
}
function searchOffer($s, $mysqli){
    $search=$mysqli->query("SELECT * FROM `offers` WHERE `job` LIKE '%$s%' ");
    $search=$search->fetch_all();
    return $search;
}

$searchP=searchProduct($_POST['search'], $mysqli);
$searchO=searchOffer($_POST['search'], $mysqli);

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
    <title>Recherche</title>

</head>
<body style="background-image: url(images/fonddecranblanc.jpg);">
    

<?php include('navBar.php'); ?>
<div >
<?php
if(isset($searchP)) :
?>
    <h3 style="text-align: center; color:#DCA66F;font-family: 'Times New Roman', Times, serif;text-shadow: 2px 2px 2px black;font-size: x-large;font-size: 40px; font-style: italic">Voici nos produits associés à votre recherche :</h3>
    <div class="row">
<?php
    foreach($searchP as $row) :
?>
    <div class="col-md-3">    
            <div  style="text-align:center;background-color: white;border-radius:10px; margin:10px"> 
              <div id="box" >
                <a href="product.php?product_id=<?= $row[0] ?>" style="text-decoration : none;">
                    <img src="<?= $row[3] ?>" alt="" id="imgg"/>
                </a>
              </div>
              <div class="card-body">
                <b>
                    <div class="card-title" style="color:black;font-family: 'Times New Roman', Times, serif;font-size: x-large;font-size: 25px; font-style: italic"><?= $row[1] ?> </div>
                    <div class="card-title" style="color:red "> <?= $row[4] ?>€</div>
                </b>
              </div>
            </div>
          </div>

<?php
    endforeach;
    ?>
    </div>
    <?php
endif;

if(isset($searchO)) :
?>
    <h3 style="text-align: center; color:#DCA66F;text-shadow: 2px 2px 2px black;font-family: 'Times New Roman', Times, serif;font-size: x-large;font-size: 40px; font-style: italic">Voici nos offres d'emploi associés à votre recherche :</h3>
    <div class="row">
<?php
    foreach($searchO as $row) :
?>
        <div class="card" style="width: 18rem; margin: 15px; height :300px;text-align:center">
          <div class="card-body">
            <h5 class="card-title" ><?= $row[1] ?></h5>
            <p class="card-text"><?= $row[2] ?></p>
            <h5 class="card-title"><?= $row[3] ?>Euros</h5>
            <form action="difficulte.php" method="post">
              <input type="hidden" name="offers_id" value="<?= $row[0] ?>">
              <?php  if(isset($_SESSION['user'])) :  ?>
              <button type="submit" class="btn btn-primary" >Postuler à cette offre</button>
              <?php  
                      else: ?>
              <a href="connexion.php"><input type="button" class="btn btn-primary" value="Connectez-vous pour postuler"></a>
              <?php endif; ?>
            </form>
          </div>
        </div>
<?php
    endforeach;
    ?>
    </div>
    <?php
endif;
?>
</div>
</body>
</html>