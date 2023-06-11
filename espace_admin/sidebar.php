<!-- Sidebar -->
<?php if (!isset($_SESSION)) {
    // Aucune session active, démarrer une nouvelle session
    session_start();
} ?>
<div class="sidebar" id="mySidebar">
<div class="side-header">
    <img src="./assets/images/logo_admin.png" width="120" height="120" alt="Formation php"> 
    <h5 style="margin-top:10px;"><?php echo "Bienvenue"." "."M. ".$_SESSION["nom_admin"]?></h5>
</div>

<hr style="border:1px solid; background-color:#8a7b6d; border-color:#283747 ;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="./index.php" ><i class="fa fa-home"></i> Dashboard</a>
    <a href="#abandons"  onclick="showAbandons()" ><i class="fa fa-users"></i> Abandons</a>
    <a href="#certifiés"  onclick="showCertifies()" ><i class="fa fa-users"></i> Certifiés</a>
    <a href="#categories"   onclick="showCategory()" ><i class="fa fa-th-large"></i> Catégories</a>
    <a href="#Formations"   onclick="showFormations()" ><i class="fa fa-th"></i> Formations</a>
    <a href="#etudiants"   onclick="showEtudiants()" ><i class="fa fa-users"></i> Etudiants inscrits/validés</a>
    <?php if(!empty($_SESSION["id_admin"]) and $_SESSION["id_admin"] == 1){ ?>
    <a href="#formateurs"   onclick="showFormateurs()" ><i class="fa fa-th"></i> Formateurs</a>
    <?php } ?>    
    <a href="#questions"   onclick="showQuestions()" ><i class="fa fa-th"></i> Questions</a>
    <a href="#test"   onclick="showTests()" ><i class="fa fa-th"></i> Validation des tests</a>
  
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>


