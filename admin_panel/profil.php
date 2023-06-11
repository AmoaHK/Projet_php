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
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    @$matricule = $_POST["matricule"];
    @$nom = $_POST["nom"];
    @$prenom = $_POST["prenom"];
    @$mdp = $_POST["pass"];
    @$mdp1 = $_POST["repass"];
    $imdp = $_SESSION['pass'] ;
    $cat_etu=$_SESSION['cat_etu'];
    $email = $_SESSION['email'];
    $lib_cat = $_SESSION["lib_cat"];

    $mat = $_SESSION['matricule'];
    
    


    $sql1 = "UPDATE etudiant SET MDP = '$mdp'  WHERE EMAIL = '$email'";
   



    
    if( isset($_POST["valider"]) ) {
      

      $file = $_FILES['photo'];
    
      // Informations sur le fichier
      $fileName = $file['name'];
      $fileTmpPath = $file['tmp_name'];
      $fileSize = $file['size'];
      $fileError = $file['error'];
    
      // Chemin de destination pour enregistrer le fichier
      $destinationPath =preg_replace('/[^A-Za-z0-9 ]/', '', 'assets/images/' . $fileName);
    

      echo $fileError;
      // Vérifier s'il y a une erreur lors du téléchargement
      if ($fileError === UPLOAD_ERR_OK) {
        // Déplacer le fichier vers le dossier de destination
        if (move_uploaded_file($fileTmpPath, $destinationPath)) {
          echo "L'image a été téléchargée avec succès.";
          $sql4 =  "UPDATE etudiant SET PHOTO ='$destinationPath'  WHERE MATRICULE = '$mat'";
          try {
            $idCnx->exec("USE qcm_php");
            $res4 = $idCnx->exec($sql4);
            $message = '<div class="success">Inscription réussie.</div>';
        header("location: index.php");
        
        } catch(Exception $e) {
            echo "Insertion impossible : " . $e->getMessage();
        }


        } else {
          echo "Une erreur s'est produite lors du téléchargement de l'image.";
        }
      } else {
        echo "Une erreur s'est produite lors du téléchargement de l'image : code d'erreur $fileError.";
      }

    }
    
     
    
 
    $message ="";
    if(   $mdp!= null &&  $mdp1==$mdp )
    {	
        try {
            $idCnx->exec("USE qcm_php");
            $res = $idCnx->exec($sql1);
           
            
        } catch(Exception $e) {
            echo "Insertion impossible : " . $e->getMessage();
        }
    }



?>
  

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
        <div >
  <h2>Profil</h2>
  <form action="" method="post" enctype="multipart/form-data">
  
    <div class="row">
        <div class="col-8" >
            <div class="top-margin pt-2">
              <label>Nom  </label>
              <input type="text" name="nom" value="<?php echo $_SESSION['nom'];    ?> " class="form-control" required disabled>
            </div>
            <div class="top-margin pt-2">
              <label>Prénoms  </label>
              <input type="text"name="prenom" value="<?php echo $_SESSION['prenom']; ?> " class="form-control" required disabled>
            </div>
            
            <div class="top-margin pt-2">
              <label>Matricule  </label>
              <input type="text" name="matricule"   value="<?php echo $_SESSION['matricule']; ?> "  class="form-control" required  disabled>
            </div>

            <div class="top-margin pt-2">
              <label>Niveau  </label>
              <input type="text" name="matricule"   value="<?php echo  $lib_cat; ?> "  class="form-control" required  disabled>
            </div>
            
            
            <div class="top-margin pt-2">
              <label>Email Address  </label>
              <input type="email" value="<?php echo $_SESSION['email']; ?> " name="emai"l class="form-control" required disabled>
            </div>

            <div class="row top-margin pt-2">
              <div class="col-sm-6">
                <label>Mot de pass  </label>
                <input type="password" name="pass" class="form-control" >
              </div>
              <div class="col-sm-6">
                <label>Confirmer mot de pass  </label>
                <input type="password" name="repass" class="form-control" >
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-lg-8">
                                        
              </div>
              <div class="col-lg-4 text-right">
                <input type="submit"  class="btn btn-action" name="valider" value="Modifier" enctype="multipart/form-data" />
              </div>
            </div>
      </div>
      <div class="col-4 ">
      <img class="mx-3 div-rond"  width="120" height="120" src=  "<?php   if($_SESSION["photo"] != null){
                                                echo $_SESSION["photo"];
                                            }else{ echo "assets/images/sssds.png  ";}?>">  
        <input type="file" class="btn btn-action" name="photo" id="photo" accept="image/*">
      </div>
    </div>
    </form>
        </div>
        
    </div>
       
            
       


    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>