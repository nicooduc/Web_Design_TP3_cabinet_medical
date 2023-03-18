<?php
require('../Controller/Util.php');

session_start();

$Util = new Util();
$Util->dbConnection();

if ($Util->mysqli->connect_error) {
    die('Erreur de connexion (' . $Util->mysqli->connect_errno . ')' . $Util->mysqli->connect_error);
}

$sql = "SELECT * FROM patient ORDER BY nom_patient ASC";
$result = mysqli_query($Util->mysqli, $sql);

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
?>