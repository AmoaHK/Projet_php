<div >
  <!--
  <h2>All Customers</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Username </th>
        <th class="text-center">Email</th>
        <th class="text-center">Contact Number</th>
        <th class="text-center">Joining Date</th>
      </tr>
    </thead>-->
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
     /* include_once "../config/dbconnect.php";
      $sql="SELECT * from users where isAdmin=0";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["first_name"]?> <?=$row["last_name"]?></td>
      <td><?=$row["email"]?></td>
      <td><?=$row["contact_no"]?></td>
      <td><?=$row["registered_at"]?></td>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }*/
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
            //$count=$count+1;   
    }
    ?>
  </table>