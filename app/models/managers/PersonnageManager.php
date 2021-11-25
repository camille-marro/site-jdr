<?php

class PersonnageManager extends Model {

    public function checkInputStream($stream) {
        return preg_match('/^[A-Za-z0-9-àâäêëéèîïöôû ]+$/', $stream);
    }
    
    public function getPersonnageFromID($id) {
        $raw_personnage = $this->getSpecificElementFromTable('Personnage', "ID = $id");
        if (count($raw_personnage) > 1) {
            return 'erreur';
        } else return $raw_personnage[0];
    }

    public function getCompetencesFromID($id) {
        $raw_competences = $this->getSpecificElementFromTable('Compétences', "ID_p = $id");
        $competences = $this->makeCompetences($raw_competences);
        return $competences;
    }

    public function makeCompetences($raw_competences) {
        $competences = array();
        $agi_competences = array();
        $int_competences = array();
        $for_competences = array();
        $cha_competences = array();
        foreach($raw_competences as $raw_competence) {
            if ($raw_competence['type'] == 'agi') array_push($agi_competences, $raw_competence);
            if ($raw_competence['type'] == 'int') array_push($int_competences, $raw_competence);
            if ($raw_competence['type'] == 'for') array_push($for_competences, $raw_competence);
            if ($raw_competence['type'] == 'cha') array_push($cha_competences, $raw_competence);
        }
        $competences['agi'] = $agi_competences;
        $competences['int'] = $int_competences;
        $competences['for'] = $for_competences;
        $competences['cha'] = $cha_competences;
        return $competences;
    }

    public function getItemsFromID($id) {
        $items_raw = $this->getSpecificElementFromTable('Objets', "ID IN (SELECT ID_o FROM Lien_inventaire WHERE ID_p = $id)");
        $liens = $this->getSpecificElementFromTable('Lien_inventaire', "ID_p = $id");

        $items = array();
        foreach ($items_raw as $item) {
            foreach ($liens as $lien) {
                if  ($item['ID'] == $lien['ID_o']) {
                    $item['quantite'] = $lien['quantite'];
                    array_push($items, $item);
                }
            }
        }

        return $items;
    }

    public function refresh_glods($glods, $id) {
        $this->updateSpecificElement ('Personnage', 'glods', $glods, "ID = $id");
    }

    public function getIDPersonnageFromNom($nom_personnage) {
        $nom_personnage = strtolower($nom_personnage);
        $raw_id = $this->getSpecificElementFromTable('Personnage', "nom = '$nom_personnage'");
        return $raw_id;
    }

    public function checkIfValueInTable($tableName, $where) {
        $nb_elem = $this->getNbElementInTable($tableName, $where);
        if ($nb_elem <= 0) return false;
        else return true;
    }
}