<?php
class Database extends Table{
    private $db;
    function __construct($db) {
        $this->db = $db;
    }
}