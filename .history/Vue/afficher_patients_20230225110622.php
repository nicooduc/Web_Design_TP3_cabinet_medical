<?php

require('../Controller/Util.php');
//require('../Controller/afficher_patients_2bdd.php');


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
                            <form action="../Controller/afficher_patients_2bdd.php" method="get">
                                <?php

                                if (session_status() == PHP_SESSION_NONE) {
                                    session_start();
                                }
                                $data = $_SESSION['data'];

                                // traitement des données et affichage
                                //foreach ($data as $patient) {
                                // afficher chaque patient dans une carte
                                //}
                                
                                // echo "<table>";
                                // echo "<tr>
                                //         <th>Nom</th>
                                //         <th>Prénom</th>
                                //         <th>Date de naissance</th>
                                //         <th>Sexe</th>
                                //     </tr>";

                                foreach ($data as $patient) {
                                    ?>
                                    <div class="card">
                                        <img src="<?php echo $patient['photo']; ?>"
                                            alt="<?php echo $patient['nom_patient']; ?>">
                                        <h2>
                                            <?php echo $patient['nom_patient'] . ' ' . $patient['prenom_patient']; ?>
                                        </h2>
                                        <p>
                                            <?php echo $patient['adresse'] . ', ' . $patient['ville']; ?>
                                        </p>
                                        <a href="fiche_patient.php?id=<?php echo $patient['id_patient']; ?>">Voir la
                                            fiche</a>
                                    </div>
                                    <?php
                                }
                                // ? >
                                
                                // while ($row = mysqli_fetch_array($result)) {
                                // echo "<tr>
                                // <td>" . $row['nom_patient'] . "</td>
                                // <td>" . $row['prenom_patient'] . "</td>
                                // <td>" . $row['date_naissance_patient'] . "</td>
                                // </tr>";
                                // }
                                
                                // echo "</table>";
                                ?>
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
                                <a href="#"><i class="icon-calendar"></i> Liste des rendez-vous</a>
                                <hr />
                                <a href="#"><i class="icon-plus-sign"></i> Ajouter un rendez-vous</a>
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