<!DOCTYPE html>
<html>

    <head>
        <title>Admin</title>

        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
                integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="assets/images/assets/images/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
            <link rel="stylesheet" href="./assets/css/style.css">
            </link>
        </head>
    </head>

    <body>

    <?php
    date_default_timezone_set('Africa/Abidjan');
    $heure_debut = date("H:i:s");

    session_start();
    include "./adminHeader.php";
    include "./sidebar.php";

    include_once "dbconnect.php";


    $cat = $_SESSION['cat_etu'];
    $sql1 = "SELECT * FROM question WHERE ID_CATEGORIE = '$cat' ";
    $sql6 = "SELECT * FROM categorie WHERE ID_CATEGORIE = '$cat' ";




    $res5 = "";



    $idCnx->exec("USE qcm_php");
    $res = $idCnx->query($sql1);
    $res11 = $idCnx->query($sql1);
    $res6 = $idCnx->query($sql6);

    foreach ($res6 as $row) {
        $_SESSION["lib_cat"] = $row["LIB_CATEGORIE"];
        $lib_cat = $_SESSION["lib_cat"];
    }

    //$res1 = $idCnx->query($sql2);
    $reponses_correctes = array();
    $id_qestion = array();






    ?>


    <div id="main-content" class="container allContent-section py-4">
        <div class="row">

            <h2> <a style="font-size: 45px; color:dark" href="test.php">Test</a> / Test
                <?php echo $lib_cat ?>
            </h2>
            <?php


            $i = 1;
            $pts = 0;



            foreach ($_SESSION['reponse'] as $response) {

                // echo "  ".$response;
            

                if ($response == @$_POST["rep" . $i]) {
                    $pts += 1;
                }

                $i += 1;


            }

            if ( @$_POST["valider"] == "Envoyer") {
                $heure_fin = date("H:i:s");
                $heure1 = new DateTime($heure_fin);
                $heure2 = new DateTime($_SESSION['heure_debut']);

                // Soustraction des heures
                $diff = $heure1->diff($heure2);

                // Calcul de la différence en secondes
                $heure1->sub(new DateInterval('PT' . $heure2->format('H') . 'H' . $heure2->format('i') . 'M' . $heure2->format('s') . 'S'));
                // $diff_en_secondes = $diff->s + ($diff->i * 60) + ($diff->h * 3600);
            
                // Affichage du résultat
                // echo "Différence  : "  ;print_r($diff);
                $temps = $heure1->format('H:i:s');


                $date = date("Y-m-d");

                $matt = $_SESSION['matricule'];
                $_SESSION["note"] = $pts;


                try {
                    $sql5 = "INSERT INTO test (MATRICULE, DATE_TEST, DUREE_TEST,NOTE) VALUES ( '$matt', ' $date', '$temps', '$pts')";
                    $res5 = $idCnx->query($sql5);
                    header("location: resultat_test.php");
                } catch (Exception $e) {
                    echo "Insertion impossible : " . $e->getMessage();
                }
            } ?>

            <div class="container mt-5">
                <div class="card">
                    <?php
                    $num = 0;
                    $numi = 0;

                    ?>
                    <form action="" method="post">

                        <?php
                        //print_r($reponses_correctes);
                        foreach (@$res11 as $rowX) {
                            array_push($id_qestion, $rowX["ID_QUESTION"]);
                        }
                        $indexAleatoire = array_rand($id_qestion, 20);
                        print_r($indexAleatoire);   
                        foreach ($res as $row) {
                            $num += 1;
                            $rep = "rep" . $num;
                            // echo "push bonne reponse  : ".$row["BN_REPONSE"]; 
                            array_push($reponses_correctes, $row["BN_REPONSE"]);

                            if ($row["ID_QUESTION"] == $id_qestion[$indexAleatoire[$numi]]) {
                                $numi += 1; 
                                
                                if($numi == 21){
                                    break;
                                }?>
                                

                                <div class="card-body"> 
                                    <div class="card-title" style="color:white;">
                                            <?php echo $numi . "- ";
                                            echo $row["LIB_QUESTION"]; ?>
                                            <?php if ($row["TYPE_QUESTION"] == "cocher_rep") {
                                                $idq = $row["ID_QUESTION"];
                                                $sql2 = "SELECT * FROM reponse WHERE ID_QUESTION = '$idq' ";

                                                $res1 = $idCnx->query($sql2);
                                                foreach ($res1 as $row1) {
                                                    ?>
                                                    <h5 class="pt-3">
                                                        <select class="form-select " id="<?php echo $rep ?>" name="<?php echo $rep ?>">
                                                            <option selected disabled>Sélectionnez la bonne réponse</option>
                                                            <option value="<?php echo $row1["LIB_REPONSE_A"]; ?>"><?php echo $row1["LIB_REPONSE_A"] ?></option>
                                                            <option value="<?php echo $row1["LIB_REPONSE_B"]; ?>"><?php echo $row1["LIB_REPONSE_B"] ?></option>
                                                            <option value="<?php echo $row1["LIB_REPONSE_C"]; ?>"><?php echo $row1["LIB_REPONSE_C"] ?></option>
                                                            <option value="<?php echo $row1["LIB_REPONSE_D"]; ?>"><?php echo $row1["LIB_REPONSE_D"] ?></option>
                                                        </select>
                                                    </h5>
                                                    <?php

                                                }
                                            } elseif ($row["TYPE_QUESTION"] == "saisir_rep") { ?>
                                                <h5 class="card-text pt-3" style="color:white;">
                                                    reponse :
                                                    <input type="text" id="<?php echo $rep ?>" name="<?php echo $rep ?>">
                                                </h5>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                       


                                </div>


                            
                                        <?php }

                            $_SESSION['reponse'] = ($reponses_correctes);
                            $_SESSION['heure_debut'] = $heure_debut;
                        
                            }
                            ?>




                            <h5 style="color:white;">
                                <input class="btn btn-action btn-white" name="valider" value="Envoyer" type="submit" />

                            </h5>

                    </form>

                </div>
            </div>







        </div>

    </div>





    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>