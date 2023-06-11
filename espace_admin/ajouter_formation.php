<?php
           
            include_once "./config/connexion_db.php";

            if(isset($_POST["valider"])){

            //@$identifiant = $_POST["id_formation"];
            @$nom = $_POST["nom"];
            if($_POST["categorie"] == "Amateur PHP")  @$categorie = "cat1";
            if($_POST["categorie"] == "Animateur PHP")  @$categorie = "cat2";
            if($_POST["categorie"] == "Developpeur WebD01")  @$categorie = "cat3";
            if($_POST["categorie"] == "Developpeur WebD02")  @$categorie = "cat4";
            if($_POST["categorie"] == "Concepteur site Web")  @$categorie = "cat5";
            @$statut = $_POST["statut"];
            @$formateur = $_POST["formateur"];
            @$descrip_formation = $_POST["contenu_formation"];
            @$valider = $_POST["valider"];

      /*if(empty($identifiant))
         echo "identifiant laissé vide";*/
     if(empty($nom))
          echo "Nom laissé vide";
      elseif(empty($categorie))
          echo "Catégorie non sélectionnée";
     elseif(empty($statut))
          echo "Statut non renseigné";
      elseif(empty($formateur))
          echo "Matricule du formateur obligatoire";
      elseif(empty($descrip_formation))
          echo "Contenu de la formation à remplir obligatoirement";
      else{
         try{
                       $idCnx ->exec("USE qcm_php");
                       $sql = "INSERT INTO formation VALUES ($formateur','$categorie','$nom','$descrip_formation', '$statut') ";
                       $res = $idCnx->exec($sql);
                       echo "formation ajoutée avec succès";
                    }catch(Exception $e){

                        echo "Insertion impossible : ", $e-> getMessage();

                    }
      }
   }
?>
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
            include "./adminHeader.php";
            include "./sidebar.php";?>

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
        <div class="col-8" >
          <form method="POST" action="">
            <div class="top-margin">
              <label>Nom de la formation</label>
              <input type="text" name="nom" value="<?php echo @$nom;    ?> " class="form-control" >
            </div>
            <!--<div class="top-margin">
              <label>Créer un Identifiant de formation </label>
              <input type="text" name="id_formation"   value="<?php echo @$matricule; ?> "  class="form-control" >
            </div> -->
            <div class="top-margin">
              <label>Catégorie</label>
              <select name="categorie">
                  <option <?php if(@$categorie=="Amateur PHP") echo "selected";?>>Amateur PHP</option>
                  <option <?php if(@$categorie=="Animateur PHP") echo "selected";?>>Animateur PHP</option>
                  <option <?php if(@$categorie=="Developpeur WebD01") echo "selected";?>>Developpeur WebD01</option>
                  <option <?php if(@$categorie=="Developpeur WebD02") echo "selected";?>>Developpeur WebD02</option>
                  <option <?php if(@$categorie=="Concepteur site Web") echo "selected";?>>Concepteur site Web</option>
               </select>
            </div>
            <div class="top-margin">
              <label>Statut</label>
              <select name="statut">
                  <option <?php if(@$statut=="Valide") echo "selected";?>>Valide</option>
                  <option <?php if(@$statut=="Invalide") echo "selected";?>>Invalide</option>
               </select>
            </div>
            <div class="top-margin">
              <label>Matricule Formateur </label>
              <input type="text"name="formateur" value="<?php echo @$formateur; ?> " class="form-control" >
            </div>
            <div class="top-margin">
              <label>Description </label>
              <textarea name="contenu_formation" class="form-control"></textarea>
            </div>
              <div class="col-lg-4 text-right">
                <input type="submit"  class="btn btn-action" name="valider" value="Enregistrer" />
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
<?php 
unset($identifiant);
unset($categorie);
unset($formateur); ?>
