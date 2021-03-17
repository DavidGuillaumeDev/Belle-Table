<?php
    include('db.inc.php');
    session_start();
    $offers=$mysqli->query('SELECT * FROM offers');
    $offers=$offers->fetch_all();
    if(isset($_SESSION['user'])){
        if(isset($_POST['cv']) && isset($_POST['coverletter']) && isset($_POST['offers_id']) && isset($_POST['note']) && isset($_POST['niveau'])){
            $result=$mysqli->prepare("INSERT INTO `candidat`(`cv`,`cover_letter`,`user_id`,`offers_id`,`note`,`niveau`) VALUES (?,?,?,?,?,?)");
            $result->bind_param('ssiiii',$_POST['cv'], $_POST['coverletter'],$_SESSION['user']['id'],$_POST['offers_id'],$_POST['note'],$_POST['niveau']);
            $result->execute();
            ?>  <div class="alert alert-success" role="alert" style="text-align: center">
                Votre candidature a bien été envoyé.
            </div><?php header('Refresh: 3;index.php');
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
    <title>Postuler à une offre</title>
</head>
<body>

    <?php include('navBar.php'); ?>
    <div style="background-image: url(images/fonddecran2.jpg); height: 861px; background-repeat: no-repeat;background-size: cover;">
    <div class="container" style="text-align:center;">
        <div class="row">
            <div class="col-sm-12" style="height:100px;"></div>
            <div class="col-sm-3"></div>
            <div class="col-sm-6" style="text-align: center;background-color: white; height:600px; border: 2px solid black; border-radius: 10px;">
                <h4>Candidature</h4>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="cv" class="form-label">Entrez votre CV :</label>
                            <textarea name="cv" cols="30" rows="8" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="coverletter" class="form-label">Entrez votre lettre de motivation :</label>
                            <textarea name="coverletter" cols="30" rows="8" class="form-control" required></textarea>
                        </div>
                        <input type="hidden" name="offers_id" value="<?= $_POST['offers_id']; ?>">
                        <input type="hidden" name="niveau" value="<?= $_POST['niveau']; ?>">
                        <input type="hidden" name="note" value="<?= $_POST['note'] ?>">
                        <button type="submit" class="btn btn-primary">Postuler</button>
                    </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
    </div>
</body>
</html>