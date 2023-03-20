<?php

require('../Controller/afficher_rdv_2bdd.php');

session_start();

/*-- Verification si le formulaire d'authenfication a été bien saisie --*/
if ($_SESSION["acces"] != 'y') {
    /*-- Redirection vers la page d'authentification --*/
    header("location:index.php");
} else {
    $Util = new Util();
    $Utilisateur = $Util->getUtilisateurById($_SESSION["ID_CONNECTED_USER"]);
    $Secretaire = new Secretaire();
    $Secretaire = $Utilisateur->getSecretaire();
}


?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php

        echo $Secretaire->getNom_Secretaire() . ' ' . $Secretaire->getPrenom_Secretaire();
        ?>
    </title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="js/jquery/css/ui-lightness/jquery-ui-1.9.2.custom.css" type="text/css" />
    <link rel="shortcut icon" href="bootstrap/img/brain_icon_2.ico" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div id="content" class="span9">
                <div class="main_body">

                    <div class="Home-Header">
                        <div class="Slogan">

                        </div>
                        <div class="Contact-Research">

                        </div>
                        <div class="Logo">

                        </div>
                    </div>
                    <div class="Horizontal-menu">
                        <center>
                            <h4>
                                <?php
                                echo $Secretaire->getNom_Secretaire() . ' ' . $Secretaire->getPrenom_Secretaire();
                                ?>
                            </h4>
                        </center>
                    </div>
                    <div class="Left-body">
                        <div class="Left-body-head">
                            Liste des patients
                        </div>
                        <div class="infos">

                        </div>
                        <div class="en_bref">
                            <form action="../Controller/afficher_rdv_2bdd.php" method="get">
                                <table class="afficher-rdv">
                                    <thead>
                                        <tr>
                                            <th>Id_Rdv</th>
                                            <th>Date</th>
                                            <th>Salle</th>
                                            <th>Patient</th>
                                            <th>Medecin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($rdv = mysqli_fetch_assoc($rdvs)) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $rdv['Id_Rendez_Vous']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $rdv['Date_Rendez_Vous']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $rdv['Salle_Rendez_Vous']; ?>
                                                </td>
                                                <td>
                                                    <?php foreach ($patients as $patient) {
                                                        if ($patient['Id_Patient'] == $rdv['Id_Patient']) {
                                                            echo $patient['Nom_Patient'] . " " . $patient['Prenom_Patient'];
                                                            break;
                                                        }
                                                    }
                                                    ; ?>
                                                </td>
                                                <td>
                                                    <?php foreach ($medecins as $medecin) {
                                                        if ($medecin['Id_Medecin'] == $rdv['Id_Medecin']) {
                                                            echo $medecin['Nom_Medecin'] . " " . $medecin['Prenom_Medecin'];
                                                            break;
                                                        }
                                                    }
                                                    ; ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>


                    </div>
                    <div class="Right-body">
                        <div class="About-us">
                            <div class="Social-NW-head">

                            </div>
                            <div class="Social-NW-body">

                                <a href="afficher_patients.php"><i class="icon-user"></i> Liste des patients</a>
                                <br />
                                <a href="afficher_medecins.php"><i class="icon-glass"></i> Liste des medecins</a>
                                <br />
                                <a href="#"><i class="icon-calendar"></i> Liste des rendez-vous</a>
                                <hr />
                                <a href="ajout_rdv.php"><i class="icon-plus-sign"></i> Ajouter un rendez-vous</a>
                                <br />
                                <a href="ajout_patient.php"><i class="icon-plus"></i> Nouvelle fiche patient</a>
                                <hr />
                                <a href="../Controller/deconnexion.php"><i class="icon-off"></i> Se
                                    d&eacute;connecter</a>

                            </div>
                        </div>


                    </div>
                </div>
                <div class="footer">
                    &COPY; Cabinet Médical 2021
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>



</html>