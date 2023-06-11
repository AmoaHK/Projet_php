
<div >
  <h2>Validation des étudiants inscrits</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Matricule</th>
        <th class="text-center">Nom</th>
        <th class="text-center">Prenom</th>
        <th class="text-center">Email</th>
        <th class="text-center">Statut</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/connexion_db.php";
        $sql = "select MATRICULE, NOM, PRENOM, EMAIL, STATUT from etudiant where STATUT != 2";
        $idCnx ->exec("USE qcm_php");
        $result=$idCnx-> query($sql);
      foreach($result as $row){
    ?>
    <tr>
      <td><?=$row["MATRICULE"]?></td>
      <td><?=$row["NOM"]?></td>
      <td><?=$row["PRENOM"]?></td>      
      <td><?=$row["EMAIL"]?></td>  
      <td><?=$row["STATUT"]?></td>
      <?php if($row["STATUT"] == 0){ ?>    
      <td><button class="btn btn-primary" style="height:40px" onclick="valider('<?=$row['MATRICULE']?>')">Valider</button></td>
      <?php  }else{ ?>
      <td><button class="btn btn-success" style="height:40px" onclick="">Validé(e)</button></td>
      <?php  } ?>
      <td><button class="btn btn-danger" style="height:40px"  onclick="variationDelete('<?=$row['MATRICULE']?>')">Supprimer</button></td>
      </tr>
      <?php  } ?>
  </table>
  
</div>
   