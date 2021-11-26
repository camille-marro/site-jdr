<?php

class Lore extends Model {
    private $_ID;
    private $_titre;
    private $_num;
    private $_contenu;
    private $_lien_carte;

    public function __construct(array $data) {
        $this->hydrate($data);
    }

    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) $this->$method($value);
        }
    }

    // SETTERS
    public function setID($ID)
    {
        $this->_ID = $ID;
    }

    public function setTitre($titre)
    {
        $this->_titre = $titre;
    }

    public function setNum($num)
    {
        $this->_num = $num;
    }

    public function setContenu($contenu)
    {
        $this->_contenu = $contenu;
    }

    public function setLienCarte($lien_carte)
    {
        $this->_lien_carte = $lien_carte;
    }

    // GETTERS
    public function getID()
    {
        return $this->_ID;
    }

    public function getTitre()
    {
        return $this->_titre;
    }

    public function getNum()
    {
        return $this->_num;
    }

    public function getContenu()
    {
        return $this->_contenu;
    }

    public function getLienCarte()
    {
        return $this->_lien_carte;
    }
}