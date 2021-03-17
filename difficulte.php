<?php  

$offers_id=$_POST['offers_id'];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>Choix Difficulté</title>

</head>
<body>
<?php include('navBar.php'); ?>

    <div class="container">
        <div class="row" style="margin : 200px">
            <div class="col-md-3"></div>
            <div class="col-md-6" style="border : 2px solid black; border-radius : 5px;text-align : center;padding : 20px;background-color: white;">
            <div class="form-group">
            <form action="qcm.php" method="post">
                <h3>Choississez la difficulté de votre QCM</h3>
                <select class="form-control" name="niveau" >
                    <option value="0">Débutant</option>
                    <option value="1">Avancé</option>
                </select>
                <input type="hidden" name="offers_id" value="<?= $offers_id ?>">
                <input type="submit" class="btn btn-primary" style="margin:10px" value="Valider">
            </form>
            </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>