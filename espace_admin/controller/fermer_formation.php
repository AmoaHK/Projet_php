<?php

    include_once "../config/connexion_db.php";
    
    $p_id=$_POST['record'];
    $sql="UPDATE formation SET STATUT='fermé' where ID_FORMATION='$p_id'";
    $idCnx ->exec("USE qcm_php");
    $result=$idCnx-> exec($sql);
    if($result == 1){
        echo"Fermeture de la formation réussie";
    }
    else{
        echo"Echec de la fermeture";
    }
    
?>