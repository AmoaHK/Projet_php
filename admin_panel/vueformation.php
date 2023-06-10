<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/images/assets/images/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="./assets/css/style.css"></link>
  </head>
</head>
<body >
    
<?php
    session_start();
    include "./adminHeader.php";
    include "./sidebar.php";
    
    include_once "dbconnect.php"; 

   
    $cat =  $_SESSION['cat_button']  ;
    $sql1 = "SELECT * FROM formation WHERE ID_CATEGORIE = '$cat' ";
    $sql2 = "SELECT * FROM categorie WHERE ID_CATEGORIE = '$cat' ";
    
      $idCnx ->exec("USE qcm_php");
      $res = $idCnx->query($sql1);
      $res1 = $idCnx->query($sql2);
    foreach($res1 as $row)
      {$nom_cat = $row ["LIB_CATEGORIE"]  ;}


    
?>
  

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
        
                <h2> <a style="font-size: 45px; color:dark" href="formation.php">Formation</a> / Cours <?php echo $nom_cat?>  </h2>

                <?php
                
                  $tail=0;
                 $cpt=0;
                 foreach($res as $row){
                    $tail+=1;
                    if($row["STATUT"] == null ){
                        $cpt+=1;

                    }
                 }
                 
                 if($cpt < $tail){
                    $res = $idCnx->query($sql1);
                    foreach($res as $row)
                    { if($row["STATUT"] != null ){
                        $cpt+=1;
                        $nf= $row["NOM_FORMATION"];
                        $df = $row["DESC_FORMATION"];
                   
                    
                    
                     ?>

                     
                    <div class="container mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="card-title" style="color:white;" >Titre : <?php echo @$nf?> </h1>
                                <h4 class="card-text"  style="color:white;"><?php echo @$df  ?></h4>
                            </div>
                        </div>
                    </div>

                    <?php   }  }   } else{?>
                        <div class="container mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="card-title" style="color:white;" >Cours <?php echo $nom_cat?> fermé </h1>
                            </div>
                        </div>
                    </div>
                        


                        <?php
                    } ?>
         </div>
        
    </div>
       
            
       


    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>