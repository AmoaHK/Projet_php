<?php

    include_once "../config/connexion_db.php";
    $id=$_POST['record'];
    $sql="update etudiant set STATUT = 1 where MATRICULE = '$id' ";
     $idCnx ->exec("USE qcm_php");
     $res = $idCnx ->exec($sql);
    if($res){
        echo"Validation reussie";
    }
    else{
        echo"Echec de la validation";
    }
    
?>