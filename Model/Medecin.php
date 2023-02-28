<?php



/**
 * Description of Medecin
 *
 * @author Amin
 */
class Medecin {
    
    /**
     * Attributs
     */
    public $Id_Medecin;
    public $Nom_Medecin;
    public $Prenom_Medecin;
    
    /**
     * 
     */
    public function __construct() {
        
    }

    /**
     * 
     * @return type
     */
    public function getId_Medecin() {
        return $this->Id_Medecin;
    }

    /**
     * 
     * @return type
     */
    public function getNom_Medecin() {
        return $this->Nom_Medecin;
    }

    /**
     * 
     * @return type
     */
    public function getPrenom_Medecin() {
        return $this->Prenom_Medecin;
    }

    /**
     * 
     * @param type $Id_Medecin
     */
    public function setId_Medecin($Id_Medecin) {
        $this->Id_Medecin = $Id_Medecin;
    }

    /**
     * 
     * @param type $Nom_Medecin
     */
    public function setNom_Medecin($Nom_Medecin) {
        $this->Nom_Medecin = $Nom_Medecin;
    }

    /**
     * 
     * @param type $Prenom_Medecin
     */
    public function setPrenom_Medecin($Prenom_Medecin) {
        $this->Prenom_Medecin = $Prenom_Medecin;
    }



    
}
