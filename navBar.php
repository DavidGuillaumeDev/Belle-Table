<?php 
include("db.inc.php");
//Vérification de session
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if(isset($_SESSION['user'])){
  //Requête count
  $panier_count=$mysqli->query('SELECT COUNT(*) AS qte FROM panier WHERE `user_id`="'.$_SESSION['user']['id'].'"');
  $panier_count=$panier_count->fetch_assoc();
}


?>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FEECE5;">
        <div class="container-fluid" >
          <a class="navbar-brand" href="index.php"><img src="images/logosanstxt.png" style="height: 50px; width: 50px;" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Offres d'emploi
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="offresEmploi.php">Offres d'emploi</a></li>
                  <li><a class="dropdown-item" href="statutJuridique.php">Statut juridique</a></li>
                  <?php if(isset($_SESSION['user']) && ($_SESSION['user']['role']==1) ) : ?>
                  <hr>
                  <li><a class="dropdown-item" href="adOffres.php">Ajouter une offre</a></li>
                  <li><a class="dropdown-item" href="gestionOffres.php">Gestion des offres d'emploi</a></li>
                  <?php endif; ?>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Services
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="services.php">Boutique</a></li>
                  <?php if(isset($_SESSION['user']) && ($_SESSION['user']['role']==1) ) : ?>
                  <hr>
                  <li><a class="dropdown-item" href="adproduct.php">Ajout de produit</a></li>
                  <li><a class="dropdown-item" href="gestionProducts.php">Gestions des produits</a></li>
                  <?php endif; ?>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  L'entreprise
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="presentEntreprise.php">Présentation de l'entreprise</a></li>
                  <li><a class="dropdown-item" href="descriptionLocaux.php">Description des locaux</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="typesPostes.php">Types de postes</a></li>
                  <li><a class="dropdown-item" href="materiels.php">Matériels informatique</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Avis et Commentaires
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="anciensAvis.php">Les anciens clients ont laissés un avis</a></li>
                  <li><a class="dropdown-item" href="avis.php">Laisser un avis</a></li>
                </ul>
              </li>
            </ul>
              <form action="search.php" class="d-flex" method="post">
                <input class="form-control me-2" type="search" name="search" placeholder="Rechercher" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
              </form>
            <ul class="nav navbar-nav navbar-right">
              <?php if(!isset($_SESSION['user'])) :   ?>
                <li style="padding: 10px;">
                  <a href="createAccount.php" title="Créer un nouveau compte"> 
                    <i class="fas fa-user-plus"></i>
                  </a>
                </li>
                <li style="padding: 10px;">
                  <a href="connexion.php" title="Se connecter"> 
                    <i class="fas fa-sign-in-alt"></i>
                  </a>
                </li>
                <?php endif; ?>
                <?php if(isset($_SESSION['user'])) : ?>
                  <li style="padding: 10px;;font-family: 'Times New Roman', Times, serif;font-size: x-large;font-size: 20px; font-style: italic">
                    Bonjour <?= $_SESSION['user']['name'] . " " . $_SESSION['user']['lastname']  ?>
                  </li>
                  <li style="padding: 10px;">
                    <a href="myaccount.php" style="text-decoration:none" title="Mon compte">  
                      <i class="fas fa-user"></i>
                    </a>
                  </li>
                  <li style="padding: 10px;">
                    <a href="deconnexion.php" title="Se deconnecter"> 
                      <i class="fas fa-user-times "></i>
                    </a>
                  </li>
                  <li style="padding: 10px;">
                    <a href="panier.php" style="text-decoration:none" title="Voir mon panier" >
                      <i class="fas fa-shopping-basket "></i>
                    </a>
                    <span class="badge bg-pill bg-primary"><?= $panier_count['qte'] ?></span>
                  </li>
                <?php endif; ?>
            </ul>       
          </div>
        </div>
      </nav>