<?php

   
    require('../Controller/Util.php');
    
    $Util = new Util();
    
    // if(isset($_POST["Nom_Patient"]) &&
    //     isset($_POST["Prenom_Patient"])&&
    //     isset($_POST["Sexe_Patient"])&&
    //     isset($_POST["Ville_Patient"])&&
    //     isset($_POST["Departement_Patient"])&&
    //     isset($_POST["Date_Naissance_Patient"])&&
    //     isset($_POST["Situation_Familiale_Patient"])&&
    //     isset($_POST["Affiliation_Mutuelle_Patient"])&&
    //     isset($_POST["Date_Creation_Dossier_Patient"])
    //     )
    {
        
        $Query = "SELECT * FROM patient";
        
        $Util->dbConnection();
        
        if ($Util->mysqli->connect_error) {
            die('Erreur de connexion ('.$Util->mysqli->connect_errno.')'. $Util->mysqli->connect_error);
        }
        
        else{
            if($Util->mysqli->query($Query) === TRUE) {
                header("location: ../Vue/secretaire_display.php");
            }
            else {
                echo "Error: " . $Query . "<br/>" . $Util->mysqli->error;
            }
        }
        
        
    }

?>