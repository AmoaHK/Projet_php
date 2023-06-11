<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>
<style>
        .div-rond {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #ccc;
        }
    </style>


<!-- Sidebar -->
<div class="sidebar" id="mySidebar">
<div class="side-header">
<img class="div-rond" width="100" height="100" src=  "<?php   if($_SESSION["photo"] != null){
                                                echo $_SESSION["photo"];
                                            }else{ echo "assets/images/sssds.png  ";}?>"> 
    <h5 style="margin-top:10px;">Hello <?php echo $_SESSION['nom']; ?></h5>
</div>

<hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="./index.php" ><i class="fa fa-home"></i> Dashboard</a>
    <a href="profil.php"   ><i class="fa fa-user"></i> Profil</a>
    <a href="formation.php"> <i class="fa fa-book"></i> Formations</a>
    <a href="test.php" >  <i class="fa fa-question"></i> Test</a>
    <a href="certificat.php"><i class="fa fa-certificate"></i> Certificats </a>    
    <a href="#products"   onclick="showProductItems()" ><i class="fa fa-history"></i> Historique</a>

  
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>


