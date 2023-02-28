<?php

   
    require('../Controller/Util.php');
    
    $Util = new Util();
    
    {
        
        // $Query = "SELECT * FROM patient";
        $result = mysqli_query($connexion,"SELECT * FROM patient ORDER BY nom_patient ASC");
        
        $Util->dbConnection();
        
        if ($Util->mysqli->connect_error) {
            die('Erreur de connexion ('.$Util->mysqli->connect_errno.')'. $Util->mysqli->connect_error);
        }
        
        else{
            if($Util->mysqli->query($Query) === TRUE) {
                header("location: ../Vue/afficher_patients.php");
            }
            else {
                echo "Error: " . $Query . "<br/>" . $Util->mysqli->error;
            }
        }
        
        
    }

?>