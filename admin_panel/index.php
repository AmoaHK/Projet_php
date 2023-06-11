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
           
            include_once "../dbconnect.php";



            
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }





?>

        

    <div id="main-content" class="container allContent-section py-4">
        <div class="row justify-content-center">
        
            <div class="col-sm-10">
                <div class="card">
                    <i class="fa fa-user  mb-2" style="font-size: 70px; color:white;"></i>
                    <h4 style="color:white;">Bienvenue<?php echo $_SESSION["nom"]." ".$_SESSION["prenom"] ?>  , sur votre Dashboard </h4>
                    <h5 style="color:white;">
                    <?php
                       
                    ?></h5>
                </div>
            </div>
           
                  
        </div>
        
    </div>
       
            
     

    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>