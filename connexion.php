<?php 
   
    include("db.inc.php");
    if(isset($_POST['mail']) && isset($_POST['password'])) {
        $mail=$_POST['mail'];
        $password=$_POST['password'];
        $sql = 'SELECT * FROM users WHERE email="'.$mail.'" AND password="'.$password.'"';
        $result=$mysqli->query($sql);
        if($result) {
            session_start();
            //fetch_assoc lit un résultat dans un tableau sous forme de tableau associatif
            $_SESSION['user'] = $result->fetch_assoc();
            header('Location: index.php ');
            $mysqli->close();
        } else {
            ?> <div class="alert alert-warning" role="alert" style="text-align: center">
                Une erreur est survenue.
            </div> <?php
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
    <title>Connexion</title>
</head>
<body style="background-image: url(images/fonddecranblanc.jpg);">

<?php include('navBar.php'); ?>
<div >
<div class="container">
    <div class="row" style="height:200px;"></div>
    <div class="row">
        <div class="col-sm-12" ></div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4" style="text-align: center; border-radius: 10px;">
        <form action="" method="post">
            <fieldset>
                <legend>Connexion</legend>
                <input type="email" style="width: 250px;" name="mail" id="" placeholder="Entrez votre adresse mail" required><br><br>
                <input type="password" style="width: 250px;" name="password" placeholder="Entrez votre mot de passe" required><br><br>
                <input type="submit" class="btn btn-primary" value="Se connecter">
            </fieldset>
        </form>
        <a href="createAccount.php" style="text-decoration:none;">Pas de compte ? Créez-en un ici <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
</div>        
    
</body>
</html>