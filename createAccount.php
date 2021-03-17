<?php
    include("db.inc.php");
    
    if(!isset($_SESSION['user'])){
        if(isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['passwordc'])){    
            $password=$_POST['password'];
            $passwordc=$_POST['passwordc'];
            //Vérification de même mdp
            if($password==$passwordc){
                $existMail = $mysqli->query('SELECT email FROM users WHERE email = "'.$_POST['mail'].'"');
                if($existMail->num_rows === 0) {
                    $name=$_POST['name'];
                    $lastname=$_POST['lastname'];
                    $email=$_POST['mail'];
                    $result=$mysqli->prepare("INSERT INTO `users`(`name`,`lastname`,`email`,`password`) VALUES (?,?,?,?)");
                    $result->bind_param('ssss',$name, $lastname, $email, $password);
                    $result->execute();
                    if($result){
                        //On va chercher le user qui vient d'être crée
                        session_start();
                        $_SESSION['user'] = [
                            'id' => $result->insert_id,
                            'name' => $name,
                            'lastname' => $lastname,
                            'email' => $email
                        ];
                        header('Location: index.php ');
                    }else {
                        ?> <div class="alert alert-warning" role="alert" style="text-align: center">
                Une erreur est survenue.
            </div> <?php
                    }
                }else {
                    ?> <div class="alert alert-warning" role="alert" style="text-align: center">
                Ce compte existe déjà.
            </div> <?php
                }   
            }else{
                ?> <div class="alert alert-warning" role="alert" style="text-align: center">
                Les mots de passe ne sont pas identiques.
            </div> <?php
            }
            
        } 
    } else {
        header('Location: index.php');
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
    <title>Création de compte</title>
</head>
<body>

    <?php include('navBar.php'); ?>
<div style="background-image: url(images/fonddecran1.jpg); height: 861px; background-repeat: no-repeat;background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12" style="height:200px;"></div>
            <div class="col-sm-3"></div>
            <div class="col-sm-6" style="text-align: center; height:380px;background-color: white; border: 2px solid black; border-radius: 10px;">
                <form action="" method="post">
                    <br><h4>Création de nouveau compte</h4><br>
                    <div style="margin:10px;">
                        <input type="text"  name="name" placeholder="Entrez votre nom" style="width: 250px;" required>
                    </div>
                    <div style="margin:10px;"><input type="text"  name="lastname" placeholder="Entrez votre prénom" style="width: 250px;" required></div>
                    <div style="margin:10px;"><input type="email"  name="mail" placeholder="Entrez votre adresse mail" style="width: 250px;" required></div>
                    <div style="margin:10px;"><input type="password"  name="password" placeholder="Entrez votre mot de passe" style="width: 250px;" required></div>
                    <div style="margin:10px;"><input type="password"  name="passwordc" placeholder="Confimez votre mot de passe" style="width: 250px;" required></div>
                    <div style="margin:10px;"><input type="submit"  class="btn btn-primary" value="Créer mon compte"></div>
                </form>
                <a href="connexion.php" style="text-decoration:none;">Déjà inscrit ? Connectez-vous ici <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</div>
</body>
</html>