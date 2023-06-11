<?php

    include_once "../config/connexion_db.php";
    
    $p_id=$_POST['record'];
    $sql="DELETE FROM admin where ID_ADMIN='$p_id'";
    $idCnx ->exec("USE qcm_php");
    $result=$idCnx-> exec($sql);
    if($result == 1){
        echo"Suppression effectuée avec succès";
    }
    else{
        echo"Echec de la suppression";
    }
    
    
?>