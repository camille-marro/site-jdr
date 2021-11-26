<?php

class LoreManager extends Model {
    public function getAllChapters() {
        return $this->getAllElementFromTable('Lore');
    }
}