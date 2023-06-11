
<div >
  <h2>Liste des formateurs</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Matricule</th>
        <th class="text-center">Nom</th>
        <th class="text-center">Prenom</th>
        <th class="text-center">Email</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/connexion_db.php";
      $sql = "select ID_ADMIN, NOM_ADMIN, PRENOM_ADMIN, EMAIL_ADMIN from admin where ID_ADMIN != 'super_admin' ";
        $idCnx ->exec("USE qcm_php");
        $result=$idCnx-> query($sql);
      foreach($result as $row){
    ?>
    <tr>
      <td><?=$row["ID_ADMIN"]?></td>
      <td><?=$row["NOM_ADMIN"]?></td>
      <td><?=$row["PRENOM_ADMIN"]?></td>      
      <td><?=$row["EMAIL_ADMIN"]?></td>      
      <td><button class="btn btn-primary" style="height:40px" onclick="">Modifier</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="delFormateur('<?=$row['ID_ADMIN']?>')">Supprimer</button></td>
      </tr>
      <?php
          }
      ?>
  </table>


  <button type="button" class="btn btn-secondary " style="height:40px" onclick  ="window.location.href = ' ./ajouter_formateur.php';">
    Ajouter Formateur
  </button>
  
</div>
   