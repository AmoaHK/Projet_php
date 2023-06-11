<?php if (!isset($_SESSION)) {
    // Aucune session active, démarrer une nouvelle session
    session_start();
} ?>
<div >
  <h2>Liste des questions</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Id_question</th>
        <th class="text-center">Catégorie</th>
        <th class="text-center">Matricule du formateur</th>
        <th class="text-center">Libéllé question</th>
        <th class="text-center">Type question</th>
        <th class="text-center">Bonne réponse</th>        
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/connexion_db.php";
      $sql = "select ID_QUESTION, ID_CATEGORIE, ID_ADMIN, LIB_QUESTION,TYPE_QUESTION, BN_REPONSE from question ";
        $idCnx ->exec("USE qcm_php");
        $result=$idCnx-> query($sql);
      foreach($result as $row){
    ?>
    <tr>
      <td><?=$row["ID_QUESTION"]?></td>
      <td><?=$row["ID_CATEGORIE"]?></td>
      <td><?=$row["ID_ADMIN"]?></td>      
      <td><?=$row["LIB_QUESTION"]?></td>
      <td><?=$row["TYPE_QUESTION"]?></td>
      <td><?=$row["BN_REPONSE"]?></td>
      <td><button class="btn btn-primary" style="height:40px" onclick="modifierQuestion('<?=$row['ID_QUESTION']?>')">Modifier</button></td>    
      <td><button class="btn btn-danger" style="height:40px" onclick="delQuestion('<?=$row['ID_QUESTION']?>')">supprimer</button></td>
      </tr>
      <?php
          }
      ?>

  </table>

  <button type="button" class="btn btn-secondary " style="height:40px" onclick  ="window.location.href = ' ./ajouter_question.php';">
    Ajouter Question
  </button>
  
</div>

<script>
function modifierQuestion(questionId) {
  // Rediriger vers la page de modification avec l'ID de la question en tant que paramètre
  window.location.href = './modifier_question.php?id=' + questionId;
}

</script>


