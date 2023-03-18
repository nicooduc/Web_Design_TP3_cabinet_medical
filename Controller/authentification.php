<?php

require('../Controller/Util.php');

if (isset($_POST["login"]) && isset($_POST["passwd"])) {
    $login = $_POST["login"];
    $pwd = $_POST["passwd"];
    $Util = new Util();

    $Utilisateur = $Util->getUtilisateur($login, $pwd);

    if ($Utilisateur != NULL) {

        session_start();
        $_SESSION["acces"] = 'y';
        $_SESSION["ID_CONNECTED_USER"] = $Utilisateur->getId_Utilisateur();
        if ($Utilisateur->getType_Utilisateur() == "Medecin") {
            header("location: ../Vue/medecin_display.php");
        }
        if ($Utilisateur->getType_Utilisateur() == "Secretaire") {
            header("location: ../Vue/secretaire_display.php");
        }

    } else {
        header("location: ../Vue/index.php");
    }
}

?>