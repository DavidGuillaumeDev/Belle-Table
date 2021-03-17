<?php

include("db.inc.php");
session_start();
$product=$mysqli->query('SELECT * FROM products WHERE `id`="'. $_GET['product_id'] .'" ');
$product=$product->fetch_assoc();

if(isset($_SESSION['user'])){
  if(isset($_POST['state'])){
    if(($_POST['state'])==1){
      if(isset($_POST['id']) && isset($_POST['qte']) &&  ($_POST['qte'])>0 && ($_POST['qte'])<=99){
        $exist=$mysqli->query('SELECT `product_id`,`qte` FROM panier WHERE `user_id`= "'.$_SESSION['user']['id'].'"  AND `product_id`= "'.$_POST['id'].'"');
        $exist=$exist->fetch_assoc();
        if(isset($exist)){
          $somme=($_POST['qte']+$exist['qte']);
          $result=$mysqli->prepare("UPDATE `panier`SET `qte`= ? WHERE `user_id`=? AND `product_id`=?");
          $result->bind_param('iii',$somme,$_SESSION['user']['id'],$_POST['id']);
          $result->execute();
          ?>  <div class="alert alert-success" role="alert" style="text-align: center">
              Votre produit a bien été ajouté au panier.
          </div> <?php
        }else{
          $result=$mysqli->prepare("INSERT INTO `panier`(`user_id`,`product_id`,`qte`) VALUES (?,?,?)");
          $result->bind_param('iis',$_SESSION['user']['id'],$_POST['id'], $_POST['qte']);
          $result->execute();
          ?>  <div class="alert alert-success" role="alert" style="text-align: center">
              Votre produit a bien été ajouté au panier.
          </div> <?php
        }
    }else{
        echo"Ce produit n'est plus disponible";
    } 
  }
  }
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
    <title>Notre entreprise</title>
</head>
<body style="background-color: #F7F4F3">
<?php include('navBar.php'); ?>
    <div class="container">
        <div class="row">
          <h2 style="text-align:center;font-family: 'Times New Roman', Times, serif;font-size: x-large;font-size: 30px; font-style: italic"><?= $product['name'] ?></h2>
        </div>
        <div class="row">
            <div class="col-sm-4">
              <span >
                  <img src="<?= $product['url'] ?>" alt="" width=300 height=300 />
              </span>
            </div>
            <div class="col-sm-4">
                <div class="card-body" >
                  <b>
                    <h3 style="color:red ; text-align:center "><?= $product['price'] ?> €</h3>
                  </b>
                  <h5>Descriptif produit :</h5>
                  <p><?= $product['description'] ?></p>
                </div>
            </div>
            <div class="col-sm-4" >
              <form action="" method="post">
                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                <input type="hidden" name="name" value="<?= $product['name'] ?>">
                <input type="hidden" name="price" value="<?= $product['price'] ?>">
                <input type="hidden" name="state" value="<?= $product['state'] ?>">
                <label for="qte" name="qte" style="margin-top:20px;">Quantité souhaitée : </label>
                <input type="number" class="form-control" style="width:60px;margin-top:20px; margin-bottom:20px" name="qte" min=1  max=99 value="1" id="qte" required>
                <?php
                  if($product['state']==1){
                      if(isset($_SESSION['user'])) :  ?>
                      <button type="submit" class="btn btn-primary" >Ajouter le produit au panier</button>
                      <?php
                              else: ?>
                      <a href="connexion.php"><input type="button" class="btn btn-primary" value="Connectez-vous pour réserver"></a>
                      <?php endif; 
                  } else { ?>
                      <h5>Ce produit n'est plus disponible</h5>
                  <?php }?>
                
                
              </form>
            </div>
        </div>
    </div>
</body>
</html>



            