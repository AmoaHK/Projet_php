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

    @$cat = array_search("Voir plus", $_POST);
    @$appuyer = $_POST["Voir plus"];
    if (isset($cat) ) {
      if(!empty($_POST)){
        $_SESSION['cat_button'] = $cat;
        header("location: vueformation.php");
      }
    }



  $disabled= array("", "", "", "", "");
  $dernierCaractere = substr($_SESSION["cat_etu"], -1);
  $entier = (int)$dernierCaractere ;



    for($i = 0; $i<5 ;$i++){
      $disabled[$i]="disabled";
      if($i == $entier-1){
        
        $disabled[$i]="";
      }
    }

    






?>
  

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
        
                <h2>Formations</h2>
                
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-sm-4">
                      <div class="card">
                          <i class="fa fa-book  mb-2" style="font-size: 70px; color:white"></i>
                          <h4 style="color:white;">Cours Amateur PHP</h4>
                          <h5 style="color:white;">
                            <form method="post" action="">			
                              <input class="btn btn-action btn-white" name="cat1" value="Voir plus" type="submit"  <?php echo $disabled[0] ?>/>	
                            </form> 
                          </h5>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="card">
                          <i class="fa fa-book  mb-2" style="font-size: 70px; color:white"></i>
                          <h4 style="color:white;">Cours Animateur PHP</h4>
                          <h5 style="color:white;">
                            <form method="post" action="">			
                              <input class="btn btn-action btn-white" name="cat2" value="Voir plus" type="submit"  <?php echo $disabled[1] ?>/>	
                            </form> 
                          </h5>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row justify-content-center">
                  <div class="col-sm-4">
                  <div class="card">
                          <i class="fa fa-book  mb-2" style="font-size: 70px; color:white"></i>
                          <h4 style="color:white;">Cours Développeur Web D01</h4>
                          <h5 style="color:white;">
                            <form method="post" action="">			
                              <input class="btn btn-action btn-white" name="cat4" value="Voir plus" type="submit" <?php echo $disabled[2] ?>/>	
                            </form> 
                          </h5>
                        </div>
                    </div>
                  <div class="col-sm-4">
                      <div class="card">
                          <i class="fa fa-book  mb-2" style="font-size: 70px; color:white"></i>
                          <h4 style="color:white;">Cours Développeur Web D02</h4>
                          <h5 style="color:white;">
                            <form method="post" action="">			
                              <input class="btn btn-action btn-white" name="cat4" value="Voir plus" type="submit" <?php echo $disabled[3] ?>/>	
                            </form> 
                          </h5>
                        </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="card">
                         <i class="fa fa-book  mb-2" style="font-size: 70px; color:white"></i>
                          <h4 style="color:white;">Cours Concepteur site Web</h4>
                          <h5 style="color:white;">
                            <form method="post" action="">			
                              <input class="btn btn-action btn-white" name="cat5" value="Voir plus" type="submit" <?php echo $disabled[4] ?>/>	
                            </form> 
                          </h5>
                       </div> 
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