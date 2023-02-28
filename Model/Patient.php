<?php



/**
 * Description of Patient
 *
 * @author Amin
 */
class Patient {
    /**
     * Attributs
     */
    public $Id_Patient;
    public $Nom_Patient;
    public $Prenom_Patient;
    public $Sexe_Patient;
    public $Adresse_Patient;
    public $Ville_Patient;
    public $Departement_Patient;
    public $Date_Naissance_Patient;
    public $Situation_Familiale_Patient;
    public $Affiliation_Mutuelle;
    public $Date_Creation_Dossier;
    
    /**
     * 
     */
    public function __construct() {
        
    }
    
    /**
     * 
     * @return type
     */
    public function getId_Patient() {
        return $this->Id_Patient;
    }

    /**
     * 
     * @return type
     */
    public function getNom_Patient() {
        return $this->Nom_Patient;
    }

    /**
     * 
     * @return type
     */
    public function getPrenom_Patient() {
        return $this->Prenom_Patient;
    }

    /**
     * 
     * @return type
     */
    public function getSexe_Patient() {
        return $this->Sexe_Patient;
    }

    /**
     * 
     * @return type
     */
    public function getAdresse_Patient() {
        return $this->Adresse_Patient;
    }

    /**
     * 
     * @return type
     */
    public function getVille_Patient() {
        return $this->Ville_Patient;
    }

    /**
     * 
     * @return type
     */
    public function getDepartement_Patient() {
        return $this->Departement_Patient;
    }

    /**
     * 
     * @return type
     */
    public function getDate_Naissance_Patient() {
        return $this->Date_Naissance_Patient;
    }

    /**
     * 
     * @return type
     */
    public function getSituation_Familiale_Patient() {
        return $this->Situation_Familiale_Patient;
    }

    /**
     * 
     * @return type
     */
    public function getAffiliation_Mutuelle() {
        return $this->Affiliation_Mutuelle;
    }

    /**
     * 
     * @return type
     */
    public function getDate_Creation_Dossier() {
        return $this->Date_Creation_Dossier;
    }

    /**
     * 
     * @param type $Id_Patient
     */
    public function setId_Patient($Id_Patient) {
        $this->Id_Patient = $Id_Patient;
    }

    /**
     * 
     * @param type $Nom_Patient
     */
    public function setNom_Patient($Nom_Patient) {
        $this->Nom_Patient = $Nom_Patient;
    }

    /**
     * 
     * @param type $Prenom_Patient
     */
    public function setPrenom_Patient($Prenom_Patient) {
        $this->Prenom_Patient = $Prenom_Patient;
    }

    /**
     * 
     * @param type $Sexe_Patient
     */
    public function setSexe_Patient($Sexe_Patient) {
        $this->Sexe_Patient = $Sexe_Patient;
    }

    /**
     * 
     * @param type $Adresse_Patient
     */
    public function setAdresse_Patient($Adresse_Patient) {
        $this->Adresse_Patient = $Adresse_Patient;
    }

    /**
     * 
     * @param type $Ville_Patient
     */
    public function setVille_Patient($Ville_Patient) {
        $this->Ville_Patient = $Ville_Patient;
    }

    /**
     * 
     * @param type $Departement_Patient
     */
    public function setDepartement_Patient($Departement_Patient) {
        $this->Departement_Patient = $Departement_Patient;
    }

    /**
     * 
     * @param type $Date_Naissance_Patient
     */
    public function setDate_Naissance_Patient($Date_Naissance_Patient) {
        $this->Date_Naissance_Patient = $Date_Naissance_Patient;
    }

    /**
     * 
     * @param type $Situation_Familiale_Patient
     */
    public function setSituation_Familiale_Patient($Situation_Familiale_Patient) {
        $this->Situation_Familiale_Patient = $Situation_Familiale_Patient;
    }

    /**
     * 
     * @param type $Affiliation_Mutuelle
     */
    public function setAffiliation_Mutuelle($Affiliation_Mutuelle) {
        $this->Affiliation_Mutuelle = $Affiliation_Mutuelle;
    }

    /**
     * 
     * @param type $Date_Creation_Dossier
     */
    public function setDate_Creation_Dossier($Date_Creation_Dossier) {
        $this->Date_Creation_Dossier = $Date_Creation_Dossier;
    }



}
