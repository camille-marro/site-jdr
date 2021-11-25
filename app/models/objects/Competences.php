<?php

class Competences extends Model {
    private $_ID;
    private $_ID_p;
    private $_type;
    private $_nom;
    private $_valeur;

    public function __construct(array $data) {
        $this->hydrate($data);
    }

    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) $this->$method($value);
        }
    }

    //SETTER
    public function setID($ID)
    {
        $this->_ID = $ID;
    }

    public function setIDP($ID_p)
    {
        $this->_ID_p = $ID_p;
    }

    public function setType($type)
    {
        $this->_type = $type;
    }

    public function setNom($nom)
    {
        $this->_nom = $nom;
    }
    public function setValeur($valeur)
    {
        $this->_valeur = $valeur;
    }


    //GETTERS
    public function getID()
    {
        return $this->_ID;
    }

    public function getIDP()
    {
        return $this->_ID_p;
    }

    public function getType()
    {
        return $this->_type;
    }

    public function getNom()
    {
        return $this->_nom;
    }

    public function getValeur()
    {
        return $this->_valeur;
    }

}