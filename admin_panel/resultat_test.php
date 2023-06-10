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

    

    if (@$_POST["valider"]=="Terminer"){
        header("location: formation.php");


    }
    if (@$_POST["valider1"]=="Terminer"){
        header("location: test.php");


    }






?>
  

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
        
                
                
                <div class="container">
                  <div class="row justify-content-center">


                  <?php if($_SESSION["note"] > 2){


                  } ?>
                    
                   
                                        <div class="col-sm-7">
                                        <div class="card">
                                            <i class="fa fa-question  mb-2" style="font-size: 70px; color:white"></i>
                                            <h2 style="color:white;"> Résultat Test <?php echo $_SESSION["lib_cat"] ?></h2>

                                            <?php if($_SESSION["note"] >= 2){ ?>
                                                <h6 style="color:white;"> <br>   Félicitations, vous avez réussi le test <?php echo $_SESSION["lib_cat"] ?>.<br> 
                                                    Votre note est <?php echo $_SESSION["note"] ?> / 4 <br> 
                                                    Veillez attendre la validation pour télecharger votre certificat de reussite. 
                                                </h6> 
                                                <h5 style="color:white;">
                                                    <form method="post" action="" >			
                                                        <input class="btn btn-action btn-white " name="valider1" value="Terminer" type="submit"/>	  
                                                    </form> 
                                                </h5>
                                                <?php
                                                }else{ ?>
                                                <h6 style="color:white;"> <br> Nous avons le regret de vous informer que vous n'avez pas réussi le <?php echo $_SESSION["lib_cat"] ?>.<br>
                                                Veuillez prendre le temps de reviser avant de réessayer.</h6>
                                                <h5 style="color:white;">
                                                    <form method="post" action="" >			
                                                        <input class="btn btn-action btn-white " name="valider" value="Terminer" type="submit"/>	  
                                                    </form> 
                                                </h5>
                                                <?php
                                                } ?> 
                                           
                                        </div> 
                                        </div>
                  </div>

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