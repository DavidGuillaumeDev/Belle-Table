<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- JavaScript Bundle with Popper Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>Notre materiel</title>

</head>

<body>


  <?php include('navBar.php'); ?>

      <div class="container">
        <div class="row">
            <div class="col-xs-12" style="height: 100px;"></div>
        </div>
        <div class="row">
            <div class="col-md-2" ></div>
            <div class="col-md-8" style="text-align: center;font-family: cursive;">
                <h1>Présentation de tout nos matériels informatique </h1> <br><br></br>
                <h2>Shéma de notre Réseau actuel :</h2><br><br>
                <img src="images/sysinfo.PNG" alt=""><br><br>
                <h2>Répartition de notre réseau :</h2><br><br>
                <img src="images/sysreseau.PNG" alt=""><br><br>
                <h2>Nos outils informatique :</h2><br><br>
                <img src="images/sysmaterials.PNG" alt=""><br><br>
                <img src="images/sysmaterials1.PNG" alt=""><br><br>
                <h2>Nos outils serveurs :</h2><br><br>
                <img src="images/sysserver.PNG" alt=""><br><br>
                <img src="images/sysserver1.PNG" alt=""><br><br>
                <h2>Notre système d'adressage :</h2><br><br>
                Le plan d’adressage utilise un réseau en classe C. Le réseau de la box. <br>
Le masque associé au réseau est 255.255.255.0 (masque par défaut). <br>
Le serveur actuel utilise l’adresse suivante : 192.168.0.20. <br>
L’imprimante réseau utilise l’adresse 192.168.0.50. <br>
Il y a un photocopieur (location) en 192.168.0.90. <br>
Tous les PC obtiennent des adresses IP aléatoires sur le même réseau. Elles sont comprises
dans la plage de 192.168.0.100 à 192.168.0.199 et fournies par la box. <br><br><br><br><br>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

</body>
</html> 