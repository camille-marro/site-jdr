<?php

class Lien_inventaire extends Model {
    private $_ID_o;
    private $_ID_p;
    private $_quantite;

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
    public function setIDO($ID_o)
    {
        $this->_ID_o = $ID_o;
    }

    public function setIDP($ID_p)
    {
        $this->_ID_p = $ID_p;
    }

    public function setQuantite($quantite)
    {
        $this->_quantite = $quantite;
    }
    
    //GETTERS
    public function getIDO()
    {
        return $this->_ID_o;
    }

    public function getIDP()
    {
        return $this->_ID_p;
    }

    public function getQuantite()
    {
        return $this->_quantite;
    }
}