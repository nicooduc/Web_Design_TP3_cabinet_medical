<?php

   require('../Controller/Util.php');
   
   
   session_start();

    /*-- Verification si le formulaire d'authenfication a été bien saisie --*/
   if($_SESSION["acces"]!='y')
   {
            /*-- Redirection vers la page d'authentification --*/
           header("location:index.php");
   }
   else{
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
                    
                    echo $Secretaire->getNom_Secretaire().' '.$Secretaire->getPrenom_Secretaire();
               ?>
        </title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="js/jquery/css/ui-lightness/jquery-ui-1.9.2.custom.css" type="text/css" />
        <link rel="shortcut icon" href="bootstrap/img/brain_icon_2.ico"/>
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
                                        echo $Secretaire->getNom_Secretaire().' '.$Secretaire->getPrenom_Secretaire();
                                   ?>
                                </h4>
                            </center>
                        </div>
                        <div class="Left-body">
                            <div class="Left-body-head">
                                Ajouter un nouveau patient 
                            </div>
                            <div class="infos">
                                
                            </div>
                            <div class="en_bref">
                                <form action="../Controller/ajout_patient_2bdd.php" method="post">
                                    <br/>
                                    <label>Nom :</label>
                                        <input class="textfield_form" type="text" name="Nom_Patient" size="50"/><br/>
                                    <label>Prénom :</label>
                                        <input class="textfield_form" type="text" name="Prenom_Patient" size="50"/><br/>
                                    <label>Sexe :</label>
                                    <input class="textfield_form" type="radio"  name="Sexe_Patient" value="Femme"/>
                                    Femme
                                    <input class="textfield_form" type="radio"  name="Sexe_Patient" value="Homme"/>
                                    Homme
                                    <br/><br/>
                                    <label>Adresse :</label>
                                    <textarea name="Adresse_Patient"></textarea>
                                    <br/>
                                    <label>Ville :</label>
                                        <input class="textfield_form" type="text" name="Ville_Patient" size="50"/>
                                    <label>Département :</label>
                                        <input class="textfield_form" type="text" name="Departement_Patient" size="50"/><br/>                                            <label>Date Naissance :</label>
                                        <input type="date" name="Date_Naissance_Patient"/>
                                        <br/>
                                    <label>Situation familiale :</label>
                                    <input  type="radio"  name="Situation_Familiale_Patient" value="Celibataire"/>
                                    Célibataire
                                    <input  type="radio"  name="Situation_Familiale_Patient" value="Marie(e)"/>
                                    Marié(e)
                                    <br/><br/>
                                    
                                    <label>Affiliation Mutuelle :</label>
                                        <input class="textfield_form" type="text" name="Affiliation_Mutuelle_Patient" size="50"/><br/>
                                     <label>Date création dossier :</label>
                                        <input type="date" name="Date_Creation_Dossier_Patient"/>
                                        <br/>
                                    <br/><br/>
                                    
                                    <input type="reset" name="effacer" value = "Effacer"/>
                                    <input type="submit" name="valider" value = "Ajouter"/>
                                </form>
                            </div>
                            
                            
                        </div>
                    <div class="Right-body">
                        <div class="About-us">
                            <div class="Social-NW-head">
                                
                            </div>
                            <div class="Social-NW-body">
                                
                                <a href="#"><i class="icon-user"></i> Liste des patients</a>
                                <br/>
                                <a href="#"><i class="icon-calendar"></i> Liste des rendez-vous</a>
                                <hr/>
                                <a href="#"><i class="icon-plus-sign"></i> Ajouter un rendez-vous</a>
                                <br/>
                                <a href="#"><i class="icon-plus"></i> Nouvelle fiche patient</a>
                                <hr/>
                                <a href="../Controller/deconnexion.php"><i class="icon-off"></i> Se d&eacute;connecter</a>
                                
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
