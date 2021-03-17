<?php

  include("db.inc.php");
  session_start();
  $products=$mysqli->query('SELECT * FROM products ');
  $products=$products->fetch_all();
  

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
    <title>Nos services</title>

</head>

<body style="background-color: #F7F4F3">


<?php include('navBar.php'); ?>
<div>
    <div class="row">
      <?php foreach($products as $row) : ?>   
        <div class="card" style="width: 20rem; margin: 15px; height :600px;background-color: white; ">
              <span id="box2" style="text-align:center" >
                  <img src="<?= $row[3] ?>" alt="" id="imgg" />
              </span>
          <div class="card-body">
            <h5 class="card-title" ><?= $row[1] ?></h5>
            <p class="card-text"><?= $row[2] ?></p>
            <h5 class="card-title"><?= $row[4] ?>€</h5>
            <?php  if($row[5]==0) : ?>
            <h5 class="card-title">État : Désactivé</h5>
            <?php  endif;
                  if($row[5]==1) :  ?>
                      <h5 class="card-title">État : Activé</h5>
            <?php  endif;  ?>
            <form action="" method="post">
              <input type="hidden" name="id" value="<?= $row[0] ?>">
              <?php  if(isset($_SESSION['user']) && $_SESSION['user']['role']==1) {  ?>
                <?php  if($row[5]==0) : ?>
                  <a class="btn btn-danger" style="margin-bottom:5px" href="activeProducts.php?product_id=<?= $row[0] ?>" style="text-decoration:none;color: white;">Activer le produit</a>
            <?php  endif;
                  if($row[5]==1) :  ?>
                      <a class="btn btn-danger" style="margin-bottom:5px" href="unactiveProducts.php?product_id=<?= $row[0] ?>" style="text-decoration:none;color: white;">Désactiver le produit</a>
            <?php  endif;  ?>
              <a class="btn btn-success" style="margin-bottom:5px" href="modifProducts.php?product_id=<?= $row[0] ?>" style="text-decoration:none;color: white;"> Modifier</a>
              <?php } ?>
            </form>
          </div>
        </div>
      <?php  endforeach; ?>  
    </div>
    </div>  



    </div>
</body>
</html> 