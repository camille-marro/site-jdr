<?php

class LoreManager extends Model {
    public function getAllChapters() {
        return $this->getAllElementFromTable('Lore');
    }

    public function getInfosFromChapitre($chapitre) {
        $raw_infos = $this->getSpecificElementFromTable('Lore', "titre = '$chapitre'");
        if (count($raw_infos) > 1) {
            return 'erreur';
        }
        return $raw_infos[0];
    }
}