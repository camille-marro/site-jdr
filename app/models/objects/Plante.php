<?php

class Plante extends Model {
    private $_ID;
    private $_ID_o;
    private $_rarete;
    private $_emplacement;
    private $_effet;
    private $_effet_desc;

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

    public function setIDO($ID_o)
    {
        $this->_ID_o = $ID_o;
    }

    public function setRarete($rarete)
    {
        $this->_rarete = $rarete;
    }

    public function setEmplacement($emplacement)
    {
        $this->_emplacement = $emplacement;
    }

    public function setEffet($effet)
    {
        $this->_effet = $effet;
    }

    public function setEffetDesc($effet_desc)
    {
        $this->_effet_desc = $effet_desc;
    }

    //GETTERS
    public function getID()
    {
        return $this->_ID;
    }

    public function getIDO()
    {
        return $this->_ID_o;
    }

    public function getRarete()
    {
        return $this->_rarete;
    }

    public function getEmplacement()
    {
        return $this->_emplacement;
    }

    public function getEffet()
    {
        return $this->_effet;
    }

    public function getEffetDesc()
    {
        return $this->_effet_desc;
    }
}