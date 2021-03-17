<?php

  include("db.inc.php");
  session_start();
  $offers=$mysqli->query('SELECT * FROM offers');
  $offers=$offers->fetch_all();

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
    <title>Nos offres d'emploi</title>

</head>

<body style="background-image: url(images/fonddecranblanc.jpg);">


<?php include('navBar.php'); ?>
<div >
    <div class="row">
    <h2 style="text-align: center; color:#DCA66F;text-shadow: 2px 2px 2px black;font-family: 'Times New Roman', Times, serif;font-size: x-large;font-size: 50px; font-style: italic">Nos offres d'emploi</h2>
      <?php foreach($offers as $row) : ?>   
        <div class="card" style="width: 18rem; margin: 15px; height :300px; border-radius: 10px;text-align:center; ">
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
              <a href="difficulte.php"><input type="button" class="btn btn-primary" value="Connectez-vous pour postuler"></a>
              <?php endif; ?>
            </form>
          </div>
        </div>
      <?php  endforeach; ?>  
    </div>       
    </div>   



    </div>
</body>
</html> 