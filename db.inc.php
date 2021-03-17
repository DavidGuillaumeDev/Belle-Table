<?php
//connexion a la base de donnée qu'on utilisera dans la grande partie des pages du code
$mysqli = new mysqli("localhost", "root", "", "belletable");
//$mysqli = new mysqli("dhminfopfogui.mysql.db", "dhminfopfogui", "MD631123os", "dhminfopfogui");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
