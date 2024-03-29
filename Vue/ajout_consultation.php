<?php

require('../Controller/afficher_patients_2bdd.php');


session_start();
/*-- Verification si le formulaire d'authenfication a été bien saisie --*/
if ($_SESSION["acces"] != 'y') {
    /*-- Redirection vers la page d'authentification --*/
    header("location:index.php");
} else {
    $Util = new Util();
    $Utilisateur = $Util->getUtilisateurById($_SESSION["ID_CONNECTED_USER"]);
    $Medecin = new Medecin();
    $Medecin = $Utilisateur->getMedecin();
    $Medecin->getId_Medecin();
}


?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php

        echo $Medecin->getNom_Medecin() . ' ' . $Medecin->getPrenom_Medecin();
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
                                echo $Medecin->getNom_Medecin() . ' ' . $Medecin->getPrenom_Medecin();
                                ?>
                            </h4>
                        </center>
                    </div>
                    <div class="Left-body">
                        <div class="Left-body-head">
                            Compte rendu de consultation
                        </div>
                        <div class="infos">

                        </div>
                        <div class="en_bref">
                            <form action="../Controller/ajout_consultation_2bdd.php" method="post">
                                <br />
                                <label>Date</label>
                                <input type="date" name="Date_Consultation" />
                                <label>Patient :</label>
                                <select name="Id_Patient" class="form-control">
                                    <?php foreach ($patients as $patient) {
                                        echo '<option value="' . $patient['Id_Patient'] . '">' . $patient['Nom_Patient'] . ' ' . $patient['Prenom_Patient'] . '</option>';
                                    }
                                    ?>
                                </select>
                                <label>Compte-rendu :</label>
                                <textarea name="Compte_rendu"></textarea>
                                <br /><br />
                                <input type="hidden" name="Id_Medecin" value="<?php echo $idMedecin; ?>">

                                <input type="reset" name="effacer" value="Effacer" />
                                <input type="submit" name="valider" value="Ajouter" />
                            </form>
                        </div>


                    </div>
                    <div class="Right-body">
                        <div class="About-us">
                            <div class="Social-NW-head">

                            </div>
                        </div>
                        <div class="Social-NW-body">

                            <a href="#"><i class="icon-list"></i> Nouvelle consultations</a>
                            <br />
                            <!-- <a href="#"><i class="icon-user"></i> Mes patients</a>
                            <br /> -->
                            <a href="medecin_rdv.php
                                "><i class="icon-calendar"></i> Mes rendez-vous</a>
                            <hr />
                            <a href="../Controller/deconnexion.php"><i class="icon-off"></i> Se déconnecter </a>

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