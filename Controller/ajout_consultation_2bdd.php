<?php


require('../Controller/Util.php');

$Util = new Util();

if (
    isset($_POST["Date_Consultation"]) &&
    isset($_POST["Id_Patient"]) &&
    isset($_POST["Compte_rendu"]) &&
    isset($_POST["Id_Medecin"])
) {

    $Query = "INSERT INTO consultation (Date_Consultation,Compte_Rendu_Consultation, Id_Patient, Id_Medecin) VALUES"
        . "('" . $_POST["Date_Consultation"] . "',"
        . "'" . $_POST["Compte_rendu"] . "',"
        . "'" . $_POST["Id_Patient"] . "',"
        . "'" . $_POST["Id_Medecin"] . "'"
        . ")";

    $Util->dbConnection();

    if ($Util->mysqli->connect_error) {
        die('Erreur de connexion (' . $Util->mysqli->connect_errno . ')' . $Util->mysqli->connect_error);
    } else {
        if ($Util->mysqli->query($Query) === TRUE) {
            header("location: ../Vue/medecin_display.php");
        } else {
            echo "Error: " . $Query . "<br/>" . $Util->mysqli->error;
        }
    }


}

?>