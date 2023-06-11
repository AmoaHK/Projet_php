
<div >
  <h2>Liste des formations</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Id_formation</th>
        <th class="text-center">Nom</th>
        <th class="text-center">Catégorie</th>
        <th class="text-center">Matricule du formateur</th>
        <th class="text-center">Statut</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/connexion_db.php";
      $sql = "select ID_FORMATION, NOM_FORMATION, ID_CATEGORIE, ID_ADMIN, STATUT from formation where ID_ADMIN != 'super_admin' ";
        $idCnx ->exec("USE qcm_php");
        $result=$idCnx-> query($sql);
      foreach($result as $row){
    ?>
    <tr>
      <td><?=$row["ID_FORMATION"]?></td>
      <td><?=$row["NOM_FORMATION"]?></td>
      <td><?=$row["ID_CATEGORIE"]?></td>      
      <td><?=$row["ID_ADMIN"]?></td>
      <td><?=$row["STATUT"]?></td>
      <?php if($row["STATUT"] == "Valide"){  ?>    
      <td><button class="btn btn-danger" style="height:40px" onclick="closeFormation('<?=$row['ID_FORMATION']?>')">Fermer</button></td>
      </tr>
      <?php
          } else{ ?>
        <td><button class="btn btn-success" style="height:40px" onclick="">Fermée</button></td>
      </tr>
      <?php
          }
      ?>
      <?php
          }
      ?>
  </table>


  <button type="button" class="btn btn-secondary " style="height:40px" onclick  ="window.location.href = ' ./ajouter_formation.php';">
    Ajouter Formation
  </button>
  
</div>
   