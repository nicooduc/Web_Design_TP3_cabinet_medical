<?php

   
    require('../Controller/Util.php');
    
    $Util = new Util();
    
    if (isset($_POST["Nom_Patient"]) &&
        isset($_POST["Prenom_Patient"])&&
        isset($_POST["Sexe_Patient"])&&
        isset($_POST["Ville_Patient"])&&
        isset($_POST["Departement_Patient"])&&
        isset($_POST["Date_Naissance_Patient"])&&
        isset($_POST["Situation_Familiale_Patient"])&&
        isset($_POST["Affiliation_Mutuelle_Patient"])&&
        isset($_POST["Date_Creation_Dossier_Patient"])
        )
        
    {
        
        $Query = "INSERT INTO patient (Nom_Patient,Prenom_Patient, Sexe_Patient, Ville_Patient, Departement_Patient, Date_Naissance_Patient, Situation_Familiale_Patient,Affiliation_Mutuelle,Date_Creation_Dossier) VALUES"
                                   ."('".$_POST["Nom_Patient"]."',"
                                   ."'".$_POST["Prenom_Patient"]."',"
                                   ."'".$_POST["Sexe_Patient"]."',"
                                   ."'".$_POST["Ville_Patient"]."',"
                                   ."'".$_POST["Departement_Patient"]."',"
                                   ."'".$_POST["Date_Naissance_Patient"]."',"
                                   ."'".$_POST["Situation_Familiale_Patient"]."',"
                                   ."'".$_POST["Affiliation_Mutuelle_Patient"]."',"
                                   ."'".$_POST["Date_Creation_Dossier_Patient"]."'"
                                   .")";
        
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