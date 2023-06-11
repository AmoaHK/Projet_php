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
            include "../adminHeader.php";
            include "../sidebar.php";
           
            include_once "../config/dbconnect.php";
            include_once "../config/connexion_db.php";
            @$matricule = $_POST["matricule"];
            @$nom = $_POST["nom"];
            @$prenom = $_POST["prenom"];
            @$sexe = $_POST["sexe"];
            @$photo = $_POST["photo"];
            @$email = $_POST["email"];
            @$mdp = $_POST["pass"];
            @$mdp1 = $_POST["repass"];
            @$valider = $_POST["valider"];
            /*$imdp = $_SESSION['pass'] ;
            $email = $_SESSION['email'];*/
            $sql = "INSERT INTO admin (ID_ADMIN, NOM_ADMIN, PRENOM_ADMIN, SEXE, EMAIL_ADMIN, MDP_ADMIN, PHOTO) VALUES ('$matricule', '$nom','$prenom','$sexe','$email', '$mdp', '$photo') ";

            if(isset($valider)){
      if(empty($matricule))
         echo "Matricule laissé vide";
     elseif(empty($nom))
          echo "Nom laissé vide";
      elseif(empty($prenom))
          echo "Prénom laissé vide";
     elseif(empty($sexe))
          echo "Sexe non renseigné";
      elseif(empty($email))
          echo "Email non renseignée";
      elseif(empty($mdp))
          echo "Mot de passe laissé vide";
      elseif(!empty($mdp1) && $mdp!=$mdp1)
          echo "Les mots de passe ne sont pas identiques";
      else{
         try{
                       $idCnx ->exec("USE qcm_php");
                       $res = $idCnx->exec($sql);
                       /*$message = '<div class="success">Inscription réussie.</div>';*/
                       echo "Formateur ajouté avec succès";
                    }catch(Exception $e){

                        echo "Insertion impossible : ", $e-> getMessage();

                    }
      }
   }
?>

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
        <div class="col-8" >
            <div class="top-margin">
              <label>Nom  </label>
              <input type="text" name="nom" value="<?php echo $nom;    ?> " class="form-control" >
            </div>
            <div class="top-margin">
              <label>Prénoms  </label>
              <input type="text"name="prenom" value="<?php echo $prenom; ?> " class="form-control" >
            </div>
            
            <div class="top-margin">
              <label>Matricule  </label>
              <input type="text" name="matricule"   value="<?php echo $matricule; ?> "  class="form-control" >
            </div>
            <div class="top-margin">
              <label>Sexe</label>
              <select name="sexe">
                  <option <?php if($sexe=="Masculin") echo "selected";?>>Masculin</option>
                  <option <?php if($sexe=="Feminin") echo "selected";?>>Féminin</option>
               </select>
            </div>
            <div class="top-margin">
              <label>Email Address  </label>
              <input type="email" value="<?php echo $email; ?> " name="email" class="form-control" >
            </div>

            <div class="row top-margin">
              <div class="col-sm-6">
                <label>Mot de passe  </label>
                <input type="password" name="pass" class="form-control" >
              </div>
              <div class="col-sm-6">
                <label>Confirmer mot de passe  </label>
                <input type="password" name="repass" class="form-control" >
              </div>
            </div>
            <div class="top-margin">
              <label>Photo  </label>
              <input type="file" value="Choisir une photo " name="photo" class="form-control" >
            </div>

            <hr>

            <div class="row">
              <div class="col-lg-8">
                                        
              </div>
              <div class="col-lg-4 text-right">
                <input type="submit"  class="btn btn-action" name="valider" value="Enregistrer" />
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