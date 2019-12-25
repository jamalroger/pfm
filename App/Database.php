<?php
class Database extends Table{
    private $dbName;
    function __construct($dbName) {
        $this->dbName = $dbName;
        
    }
}