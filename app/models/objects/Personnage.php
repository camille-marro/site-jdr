<?php

class Personnage extends Model {
    private $_ID;
    private $_nom;
    private $_agi;
    private $_int;
    private $_for;
    private $_cha;
    private $_mag;
    private $_mag_name;
    private $_mag_counter;
    private $_quete;
    private $_desc;
    private $glods;

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

    public function setAgi($agi)
    {
        $this->_agi = $agi;
    }

    public function setInt($int)
    {
        $this->_int = $int;
    }

    public function setFor($for)
    {
        $this->_for = $for;
    }

    public function setCha($cha)
    {
        $this->_cha = $cha;
    }

    public function setMag($mag)
    {
        $this->_mag = $mag;
    }

    public function setMagName($mag_name)
    {
        $this->_mag_name = $mag_name;
    }

    public function setMagCounter($mag_counter)
    {
        $this->_mag_counter = $mag_counter;
    }

    public function setQuete($quete)
    {
        $this->_quete = $quete;
    }

    public function setDesc($desc)
    {
        $this->_desc = $desc;
    }

    public function setGlods($glods)
    {
        $this->glods = $glods;
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

    public function getAgi()
    {
        return $this->_agi;
    }

    public function getInt()
    {
        return $this->_int;
    }

    public function getFor()
    {
        return $this->_for;
    }

    public function getCha()
    {
        return $this->_cha;
    }

    public function getMag()
    {
        return $this->_mag;
    }

    public function getMagName()
    {
        return $this->_mag_name;
    }

    public function getMagCounter()
    {
        return $this->_mag_counter;
    }

    public function getQuete()
    {
        return $this->_quete;
    }

    public function getDesc()
    {
        return $this->_desc;
    }

    public function getGlods()
    {
        return $this->glods;
    }
}