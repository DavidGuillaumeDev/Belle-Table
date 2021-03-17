<?php

  include("db.inc.php");
  session_start();
  //le state correspond a l'état du produit activé ou non
  $products=$mysqli->query('SELECT * FROM products WHERE `state`=1');
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
    <title>Boutique</title>
</head>
<body style="background-color: #F7F4F3">

<?php include('navBar.php'); ?>
<div >
    <div class="row" >
      <?php foreach($products as $row) :  ?>   
          <div class="col-md-3">    
            <div  style="text-align:center">
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
      <?php  endforeach; ?>  
    </div>
    </div>  
    </div>
</body>
</html> 

