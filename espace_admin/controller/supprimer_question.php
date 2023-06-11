<?php

    include_once "../config/connexion_db.php";
    
    $p_id=$_POST['record'];
    $sql1="DELETE FROM question where ID_QUESTION ='$p_id'";
    $sql2="DELETE FROM reponse where ID_QUESTION ='$p_id'";
    $idCnx ->exec("USE qcm_php");
    $result2=$idCnx-> exec($sql2);
    $result1=$idCnx-> exec($sql1);
    if($result1 == 1 && $result2 == 1){
        echo"Suppression effectuée avec succès";
    }
    else{
        echo"Echec de la suppression";
    }
    
    
?>