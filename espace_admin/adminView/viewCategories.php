
<div >
  <h3>Catégories</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Num Categorie</th>
        <th class="text-center">Nom Catégorie</th>
        <th class="text-center">Nombre de formations</th>
      </tr>
    </thead>
    <?php
      include_once "../config/connexion_db.php";
      $idCnx ->exec("USE qcm_php");
      
      $sql = "select * from categorie";  
        $result=$idCnx-> query($sql);
      foreach($result as $row){
          $id_categorie = $row["ID_CATEGORIE"];
          $sql1 = "SELECT ID_CATEGORIE FROM formation WHERE ID_CATEGORIE = '$id_categorie'";
          $result1=$idCnx-> query($sql1);
          $compteur = $result1 -> rowCount();
    ?>
    <tr>
      <td><?=$row["ID_CATEGORIE"]?></td>
      <td><?=$row["LIB_CATEGORIE"]?></td>
      <td><?=$compteur?></td>   
      <!-- <td><button class="btn btn-primary" >Edit</button></td> -->
      </tr>
      <?php
          }
      ?>
  </table>
</div>
   