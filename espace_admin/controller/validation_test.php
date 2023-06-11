<?php

    include_once "../config/connexion_db.php";
    
    $id_test=$_POST['record1'];
    $id_etudiant = $_POST['record2'];
    $note = $_POST['record3'];
    $sql1 = "SELECT * from etudiant";
    $result2=0;

    $sql2="UPDATE test SET STATUT=1 where ID_TEST='$id_test'";
    $sql3="UPDATE test SET STATUT=0 where ID_TEST='$id_test'";
    $idCnx ->exec("USE qcm_php");
    $result1 = $idCnx->query($sql1);
    foreach($result1 as $row){
        if($row["MATRICULE"] == $id_etudiant && $note>=10 && $note<=20){
            if($row["ID_CATEGORIE"] = "cat1"){
                $result2 = $idCnx->exec("UPDATE etudiant SET ID_CATEGORIE='cat2' where MATRICULE='$id_etudiant'");
            } 
            if($row["ID_CATEGORIE"] = "cat2"){
                $result2 = $idCnx->exec("UPDATE etudiant SET ID_CATEGORIE='cat3' where MATRICULE='$id_etudiant'");
            }  
            if($row["ID_CATEGORIE"] = "cat3"){
                $result2 = $idCnx->exec("UPDATE etudiant SET ID_CATEGORIE='cat4' where MATRICULE='$id_etudiant'");
            } 
            if($row["ID_CATEGORIE"] = "cat4"){
                $result2 = $idCnx->exec("UPDATE etudiant SET ID_CATEGORIE='cat5' where MATRICULE='$id_etudiant'");
            }
            $result3 = $idCnx->exec($sql2);  
        }elseif($row["MATRICULE"] == $id_etudiant && $note<10){
            $result3 = $idCnx->exec($sql3); 
        }
    }

    if($result2 == 1 && $result3 == 1){
        echo"Validation effectuée avec succès";

    }
    else{
        echo"Echec de la Validation";
    }
    
    
?>