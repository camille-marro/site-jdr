<?php

class Objets extends Model {
    private $_ID;
    private $_nom;
    private $_categorie;
    private $_desc;
    private $_count;

    public function __construct(array $data) {
        $this->hydrate($data);
    }

    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) $this->$method($value);
        }
    }

    //SETTERS
    public function setID($ID)
    {
        $this->_ID = $ID;
    }

    public function setNom($nom)
    {
        $this->_nom = $nom;
    }

    public function setCategorie($categorie)
    {
        $this->_categorie = $categorie;
    }

    public function setDesc($desc)
    {
        $this->_desc = $desc;
    }

    public function setCount($count)
    {
        $this->_count = $count;
    }

    //GETTERS
    public function getID()
    {
        return $this->_ID;
    }

    public function getNom()
    {
        return $this->_nom;
    }

    public function getCategorie()
    {
        return $this->_categorie;
    }

    public function getDesc()
    {
        return $this->_desc;
    }

    public function getCount()
    {
        return $this->_count;
    }
}