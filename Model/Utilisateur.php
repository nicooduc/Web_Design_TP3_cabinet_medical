<?php

/**
 * Description of User
 *
 * @author Amin
 */




class Utilisateur {
    
    /**
     * Attributs
     */
    public $Id_Utilisateur;
    public $Login;
    public $Password;
    public $Type_Utilisateur;
    public $Last_Login;
    public $Secretaire;
    public $Medecin;




    /**
     * Default Constructor
     */
    public function __construct(){
       $this->Secretaire = new Secretaire();
       $this->Medecin = new Medecin();
    }
    
    /**
     * 
     * @return type
     */
    public function getId_Utilisateur() {
        return $this->Id_Utilisateur;
    }

    /**
     * 
     * @return type
     */
    public function getLogin() {
        return $this->Login;
    }

    /**
     * 
     * @return type
     */
    function getPassword() {
        return $this->Password;
    }

    /**
     * 
     * @return type
     */
    function getType_Utilisateur() {
        return $this->Type_Utilisateur;
    }

    /**
     * 
     * @return type
     */
    function getLast_Login() {
        return $this->Last_Login;
    }

    /**
     * 
     * @return type
     */
    function getSecretaire() {
        return $this->Secretaire;
    }

    /**
     * 
     * @return type
     */
    function getMedecin() {
        return $this->Medecin;
    }
        
    /**
     * 
     * @param type $Id_Utilisateur
     */
    function setId_Utilisateur($Id_Utilisateur) {
        $this->Id_Utilisateur = $Id_Utilisateur;
    }

    function setLogin($Login) {
        $this->Login = $Login;
    }

    /**
     * 
     * @param type $Password
     */
    function setPassword($Password) {
        $this->Password = $Password;
    }

    /**
     * 
     * @param type $Type_Utilisateur
     */
    function setType_Utilisateur($Type_Utilisateur) {
        $this->Type_Utilisateur = $Type_Utilisateur;
    }

    /**
     * 
     * @param type $Last_Login
     */
    function setLast_Login($Last_Login) {
        $this->Last_Login = $Last_Login;
    }

    /**
     * 
     * @param type $Secretaire
     */
    function setSecretaire($Secretaire) {
        $this->Secretaire = $Secretaire;
    }

    /**
     * 
     * @param type $Medecin
     */
    function setMedecin($Medecin) {
        $this->Medecin = $Medecin;
    }



    
}