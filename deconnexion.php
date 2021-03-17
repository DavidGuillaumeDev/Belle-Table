<?php
session_start();
//Deconnexion du compte utilisateur
unset($_SESSION['user']);
header('Location: index.php');
?>