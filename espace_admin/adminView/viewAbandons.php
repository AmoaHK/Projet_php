<div >
  <h2>Liste des abandons</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Matricule</th>
        <th class="text-center">Nom</th>
        <th class="text-center">Prenom</th>
        <th class="text-center">Email</th>
        <th class="text-center">Date abandon</th>
      </tr>
    </thead>
    <?php
      include_once "../config/connexion_db.php";
      $sql="SELECT MATRICULE, NOM, PRENOM, EMAIL, DATE_ABANDON from etudiant where DATE_ABANDON is not null";
      $idCnx ->exec("USE qcm_php");
      $result=$idCnx-> query($sql);
      //$count=0;
      foreach($result as $row){
    ?>    
    <tr>
      <td><?=$row["MATRICULE"]?></td>
      <td><?=$row["NOM"]?></td>
      <td><?=$row["PRENOM"]?></td>
      <td><?=$row["EMAIL"]?></td>
      <td><?=$row["DATE_ABANDON"]?></td>
    </tr>
    <?php
    }
    ?>
  </table>