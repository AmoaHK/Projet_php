<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/images/assets/images/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="./assets/css/style.css"></link>
  </head>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .certificate {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #000;
            background-color: #fff;
        }

        .certificate h2 {
            text-align: center;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .certificate img {
            max-width: 150px;
            margin: 0 auto;
            display: block;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .certificate p {
            margin-bottom: 8px;
            line-height: 1.5;
        }

        .certificate .info {
            margin-top: 30px;
            text-align: center;
        }

        .print-button {
            text-align: center;
            margin-top: 20px;
        }

        @media print {
            body {
                background-color: #fff;
            }

            .print-button {
                display: none;
            }
        }
        .print-button button {
            padding: 12px 24px;
            font-size: 18px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .print-button button:hover {
            background-color: #45a049;
        }
    </style>

<body >
    
<?php
    session_start();
    require('fpdf/fpdf.php');
    include "./adminHeader.php";
    include "./sidebar.php";
    include_once "dbconnect.php"; 


    

   
    $cat =  $_SESSION['cat_etu']  ;
    
    $sql2 = "SELECT * FROM categorie WHERE ID_CATEGORIE = '$cat' ";
    
      $idCnx ->exec("USE qcm_php");
      $res1 = $idCnx->query($sql2);
    foreach($res1 as $row)
      {$nom_cat = $row ["LIB_CATEGORIE"]  ;}
    


    $disabled= array("", "", "", "", "");
  $dernierCaractere = substr($_SESSION["cat_etu"], -1);
  $entier = (int)$dernierCaractere ;



   
    





?>
  

    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
        
                <h2>Certificat</h2>
                <script>
        function saveCertificate() {
            window.print();
            if (window.showSaveFilePicker) {
                window.showSaveFilePicker().then(async (fileHandle) => {
                    const writableStream = await fileHandle.createWritable();
                    const pdfBlob = await fetch('certificat.pdf').then(response => response.blob());
                    await writableStream.write(pdfBlob);
                    await writableStream.close();
                });
            } else {
                alert("La fonctionnalité d'enregistrement de fichier n'est pas prise en charge dans votre navigateur. Veuillez utiliser un navigateur plus récent.");
            }
        }
      // saveCertificate();

    </script>
            <div class="container "  >

                <div class="card-body certificate"  style="width: 500px; height: 800px; ">
                    <h2>Certificat de Validation de Niveau <?php echo $nom_cat ?></h2>

                    <div class="row">  
                        <div class="col-8">
                        <p><strong>Nom:</strong> <?php echo $_SESSION["nom"] ?></p>
                    <p><strong>Prénoms:</strong> <?php echo $_SESSION["prenom"] ?></p>
                    <p><strong>Email:</strong> <?php echo $_SESSION["email"] ?></p>
                    <p><strong>Matricule:</strong> <?php echo $_SESSION["matricule"] ?></p>
                    <p><strong>Durée de formation:</strong> jkj</p>
                    <p><strong>Note moyenne obtenue:</strong> ckjdzcn djkczdc</p>
                    <p><strong>Niveau:</strong> <?php echo $_SESSION["lib_cat"] ?></p>
                        </div>

                        <div class="col-4">
                    <img src="assets/images/logo.png" style="font-size: 20px; " alt="Photo de l'apprenant">

                        </div>


                    </div>
                    <p>Ce certificat atteste que <strong>n zdnc zdl cl</strong> a validé avec succès le niveau "jkzdcnkjzncljsc" d'apprentissage.</p>

                    <p>Ce certificat atteste que <strong>jndcenckjnckjne</strong> n'a pas encore validé le niveau "kczjdncjkc" d'apprentissage.</p>

                </div>
                <div class="text-center pt-3">
                    <button onclick="saveCertificate()">jcnjkd</button>
                </div>
                
            </div>   
         </div>
        
    </div>
       
            
       


    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>