<?php

//require('../Controller/Util.php');
session_start();

$Util = new Util();
$Util->dbConnection();

if ($Util->mysqli->connect_error) {
    die('Erreur de connexion (' . $Util->mysqli->connect_errno . ')' . $Util->mysqli->connect_error);
}

$result = mysqli_query($Util->mysqli, "SELECT * FROM patient ORDER BY nom_patient ASC");

$data = array();
while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}

$_SESSION['data'] = $data;

if (count($data) > 0) {
    header("location: ../Vue/afficher_patients.php");
} else {
    echo "Aucun résultat trouvé.";
}
// {

//     // $Query = "SELECT * FROM patient";
//     $result = mysqli_query($connexion, "SELECT * FROM patient ORDER BY nom_patient ASC");

//     $data = array(); // créer un tableau pour stocker les données

    
//     $_SESSION['data'] = $data;

//     while ($row = mysqli_fetch_array($result)) { // parcourir les résultats de la requête
//         $data[] = $row; // ajouter chaque ligne de la requête au tableau $data
//     }

//     $Util->dbConnection();

//     if ($Util->mysqli->connect_error) {
//         die('Erreur de connexion (' . $Util->mysqli->connect_errno . ')' . $Util->mysqli->connect_error);
//     } else {
//         if ($Util->mysqli->query($Query) === TRUE) {
//             header("location: ../Vue/afficher_patients.php");
//         } else {
//             echo "Error: " . $Query . "<br/>" . $Util->mysqli->error;
//         }
//     }


// }

?>