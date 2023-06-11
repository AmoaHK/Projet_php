<?php
           
            include_once "./config/connexion_db.php";

            if(isset($_POST["valider"])){

            //@$id_question = $_POST["id_question"];
            @$id_formateur = $_POST["id_formateur"];
            
            if($_POST["categorie"] == "Amateur PHP")  @$categorie = "cat1";
            if($_POST["categorie"] == "Animateur PHP")  @$categorie = "cat2";
            if($_POST["categorie"] == "Developpeur WebD01")  @$categorie = "cat3";
            if($_POST["categorie"] == "Developpeur WebD02")  @$categorie = "cat4";
            if($_POST["categorie"] == "Concepteur site Web")  @$categorie = "cat5";

            if($_POST["type"] == "saisir_rep")  @$type = "saisir_rep";
            if($_POST["type"] == "liste_deroulante")  @$type = "liste_deroulante";
            if($_POST["type"] == "cocher_rep")  @$type = "cocher_rep";
            if($_POST["type"] == "completer_rep")  @$type = "completer_rep";

            @$libelle = $_POST["libelle"];
            @$reponse_A = $_POST["repA"];
            @$reponse_B = $_POST["repB"];
            @$reponse_C = $_POST["repC"];
            @$reponse_D = $_POST["repD"];
            @$rep = $_POST["reponse_correcte"];
            @$valider = $_POST["valider"];

      /*if(empty($id_question))
         echo "identifiant de la question laissé vide";*/
     if(empty($id_formateur))
          echo "identifiant du formateur laissé vide";
      elseif(empty($categorie))
          echo "Catégorie non sélectionnée";
     elseif(empty($type))
          echo "Type de la question non renseigné";
      elseif(empty($libelle))
          echo "Contenu de la question obligatoire";
      elseif(empty($reponse_A))
          echo "Proposition de réponse à remplir obligatoirement";
      elseif(empty($reponse_B))
          echo "Proposition de réponse à remplir obligatoirement";
      elseif(empty($reponse_C))
          echo "Proposition de réponse à remplir obligatoirement";
      elseif(empty($reponse_D))
          echo "Proposition de réponse à remplir obligatoirement";
      elseif(empty($rep))
          echo "Bonne réponse à remplir obligatoirement";              
      else{
         try{
                       $idCnx ->exec("USE qcm_php");
                       /*$sql1 = "INSERT INTO question VALUES ('$id_question', '$id_formateur','$categorie','$libelle','$type', '$rep') ";
                       $sql2 = "INSERT INTO reponse (id_question, reponse_A, reponse_B, reponse_C, reponse_D) VALUES ('$id_question', '$reponse_A', '$reponse_B', '$reponse_C', '$reponse_D')";
                       $res1 = $idCnx->exec($sql1);
                       $res2 = $idCnx->exec($sql2);*/

                       $libelle = $idCnx->quote($libelle);
                       $type = $idCnx->quote($type);
                       $reponse_A = $idCnx->quote($reponse_A);
                       $reponse_B = $idCnx->quote($reponse_B);
                       $reponse_C = $idCnx->quote($reponse_C);
                       $reponse_D = $idCnx->quote($reponse_D);

                       if($_POST["reponse_correcte"] == "A") @$rep = $reponse_A;
                       if($_POST["reponse_correcte"] == "B") @$rep = $reponse_B;
                       if($_POST["reponse_correcte"] == "C") @$rep = $reponse_C;
                       if($_POST["reponse_correcte"] == "D") @$rep = $reponse_D;
                       //$rep = $idCnx->quote($rep);

                        $sql1 = "INSERT INTO question (ID_ADMIN, ID_CATEGORIE, LIB_QUESTION, TYPE_QUESTION, BN_REPONSE) VALUES ('$id_formateur', '$categorie', $libelle, $type, $rep)";
                        $res1 = $idCnx->exec($sql1);

                        $sql3 = "SELECT ID_QUESTION from question where LIB_QUESTION = $libelle and BN_REPONSE = $rep";
                        $result = $idCnx -> query($sql3);
                        foreach($result as $row){
                          $compteur = $row['ID_QUESTION'];
                       }
                       $sql2 = "INSERT INTO reponse (ID_REPONSE, ID_QUESTION, LIB_REPONSE_A, LIB_REPONSE_B, LIB_REPONSE_C, LIB_REPONSE_D) VALUES ($compteur, $compteur, $reponse_A, $reponse_B, $reponse_C, $reponse_D)";

                        $res2 = $idCnx->exec($sql2);
                        echo "Question ajoutée avec succès";
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
              <!--<div class="top-margin">
              <label>Créer un identifiant à la question </label>
              <input type="text" name="id_question"   value="<?php echo @$id_question; ?> "  class="form-control" >
            </div> -->
            <div class="top-margin">
              <label>Identifiant du formateur rédigeant la question</label>
              <input type="text" name="id_formateur" value="<?php echo @$id_formateur;?> " class="form-control" >
            </div>
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
              <label>Type de la question</label>
              <select name="type">
                  <option <?php if(@$type=="saisir_rep") echo "selected";?>>saisir_rep</option>
                  <option <?php if(@$type=="liste_deroulante") echo "selected";?>>liste_deroulante</option>
                  <option <?php if(@$type=="cocher_rep") echo "selected";?>>cocher_rep</option>
                  <option <?php if(@$type=="completer_rep") echo "selected";?>>completer_rep</option>
               </select>
            </div>
            <div class="top-margin">
              <label>Libéllé de la question</label>
              <input type="text" name="libelle" value="<?php echo @$libelle;    ?> " class="form-control" >
            </div>
            <div class="top-margin">
              <label>proposition de réponse A </label>
              <input type="text" name="repA" value="<?php echo @$reponse_A;    ?> " class="form-control" >
            </div>
             <div class="top-margin">
              <label>proposition de réponse B </label>
              <input type="text" name="repB" value="<?php echo @$reponse_B;    ?> " class="form-control" >
            </div>
             <div class="top-margin">
              <label>proposition de réponse C </label>
              <input type="text" name="repC" value="<?php echo @$reponse_C;    ?> " class="form-control" >
            </div>
             <div class="top-margin">
              <label>proposition de réponse D </label>
              <input type="text" name="repD" value="<?php echo @$reponse_D;    ?> " class="form-control" >
            </div>
            <div class="top-margin">
              <label>Définir la réponse correcte à la question</label>
              <select name="reponse_correcte">
                  <option <?php if(@$rep=="A") echo "selected";?>>A</option>
                  <option <?php if(@$rep=="B") echo "selected";?>>B</option>
                  <option <?php if(@$rep=="C") echo "selected";?>>C</option>
                  <option <?php if(@$rep=="D") echo "selected";?>>D</option>
               </select>
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
