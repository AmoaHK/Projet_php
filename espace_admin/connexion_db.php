<?php
$nomUtilisateur = "root";
$motDePasse = "";
$serveur = "localhost";
$BD = "qcm_php";
$DSN = 'mysql:host =' . $serveur . ';dbname =' . $BD .';charset = utf8';
try{
$idCnx = new PDO( $DSN, $nomUtilisateur , $motDePasse);
}
catch ( Exception $e ) {
echo "Connection à MySQL impossible : ", $e -> getMessage();
die();}
?>