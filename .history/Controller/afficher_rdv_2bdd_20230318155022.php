<?php
require('../Controller/Util.php');

$Util = new Util();
$Util->dbConnection();

$sql = "SELECT * FROM rendez_vous ORDER BY Date_Rendez_Vous ASC";
$patients = mysqli_query($Util->mysqli, $sql);

if ($Util->mysqli->connect_error) {
    die('Erreur de connexion (' . $Util->mysqli->connect_errno . ')' . $Util->mysqli->connect_error);
}
?>