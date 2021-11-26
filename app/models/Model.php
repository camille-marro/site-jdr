<?php

abstract class Model
{
    //Création des constantes de la connexion à la base de données.
    private static $BDD;
    const BDD_HOST = 'mysql-camille-marro.alwaysdata.net';
    const BDD_NAME = 'camille-marro_bdd';
    const BDD_USER = '232065';
    const BDD_PASSWORD = 'CbVru8A34';

    //Connexion à la base de données.
    private static function setBDD()
    {
        self::$BDD = new PDO("mysql:host=" . self::BDD_HOST . ";dbname=" . self::BDD_NAME, self::BDD_USER, self::BDD_PASSWORD);
        self::$BDD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    //Récupère la connexion à la base de données.
    protected function getBDD()
    {
        if (self::$BDD == NULL) self::setBDD();
        return self::$BDD;
    }

    protected function getSpecificElementFromTable($tableName, $where) {
        $listData = array();
        $request = $this->getBDD()->prepare("SELECT * FROM $tableName WHERE $where");
        $request->execute();

        while ($dataProcessing = $request->fetch(PDO::FETCH_ASSOC)) {
            array_push($listData, $dataProcessing);
        }
        $request->closeCursor();
        return $listData;
    }

    protected function updateSpecificElement($tableName, $columnName, $newValue, $where) {
        $request = $this->getBDD()->prepare("UPDATE $tableName SET $columnName = $newValue WHERE $where");
        $request->execute();
        $request->closeCursor();
    }

    protected function getNbElementInTable($tableName, $where) {
        $request = $this->getBDD()->prepare("SELECT COUNT(*) FROM $tableName WHERE $where");
        $request->execute();
        $nb_elem = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();
        return $nb_elem;
    }

    protected function getAllElementFromTable($tableName) {
        $listData = array();
        $request = $this->getBDD()->prepare("SELECT * FROM $tableName");
        $request->execute();
        while ($dataProcessing = $request->fetch(PDO::FETCH_ASSOC)) {
            array_push($listData, $dataProcessing);
        }
        $request->closeCursor();
        return $listData;
    }
}
