<?php



/**
 * Description of Secretaire
 *
 * @author Amin
 */
class Secretaire {
    
    /**
     * Attributs
     */
    public $Id_Secretaire;
    public $Nom_Secretaire;
    public $Prenom_Secretaire;
    
    /**
     * 
     */
    public function __construct() {
        
    }

    /**
     * 
     * @return type
     */
    public function getId_Secretaire() {
        return $this->Id_Secretaire;
    }

    /**
     * 
     * @return type
     */
    public function getNom_Secretaire() {
        return $this->Nom_Secretaire;
    }

    /**
     * 
     * @return type
     */
    public function getPrenom_Secretaire() {
        return $this->Prenom_Secretaire;
    }

    /**
     * 
     * @param type $Id_Secretaire
     */
    public function setId_Secretaire($Id_Secretaire) {
        $this->Id_Secretaire = $Id_Secretaire;
    }

    /**
     * 
     * @param type $Nom_Secretaire
     */
    public function setNom_Secretaire($Nom_Secretaire) {
        $this->Nom_Secretaire = $Nom_Secretaire;
    }

    /**
     * 
     * @param type $Prenom_Secretaire
     */
    public function setPrenom_Secretaire($Prenom_Secretaire) {
        $this->Prenom_Secretaire = $Prenom_Secretaire;
    }


}
