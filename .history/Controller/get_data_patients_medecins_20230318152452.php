<?php
require('../Controller/Util.php');

$Util = new Util();
$Util->dbConnection();

$sql = "SELECT * FROM medecin ORDER BY nom_medecin ASC";
$medecins = mysqli_query($Util->mysqli, $sql);

// $sql = "SELECT * FROM patient ORDER BY nom_patient ASC";
// $patients = mysqli_query($Util->mysqli, $sql);

if ($Util->mysqli->connect_error) {
    die('Erreur de connexion (' . $Util->mysqli->connect_errno . ')' . $Util->mysqli->connect_error);
}
?>