
<div >
  <h2>Validation des tests des étudiants</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Num test</th>
        <th class="text-center">Matricule étudiant</th>
        <th class="text-center">Date</th>
        <th class="text-center">Durée</th>
        <th class="text-center">Note</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/connexion_db.php";

        $sql = "select MATRICULE, NOM, PRENOM, EMAIL, STATUT from etudiant where STATUT = 1";
        $sql1 = "select * from test where STATUT is null or STATUT=0";
        $idCnx ->exec("USE qcm_php");
        $result=$idCnx-> query($sql1);
      foreach($result as $row){
    ?>
    <tr>
      <td><?=$row["ID_TEST"]?></td>
      <td><?=$row["MATRICULE"]?></td>
      <td><?=$row["DATE_TEST"]?></td>      
      <td><?=$row["DUREE_TEST"]?></td>  
      <td><?=$row["NOTE"]?></td>
      <td><button class="btn btn-secondary" style="height:40px"  onclick="validerTest('<?=$row['ID_TEST']?>', '<?=$row['MATRICULE']?>','<?=$row['NOTE']?>')">Valider le test</button></td>
      </tr>
      <?php  } ?>
  </table>
  
</div>
   