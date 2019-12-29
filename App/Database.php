<?php

class Database
{
    private $db;

    public function __construct($dbName)
    {

        try {
<<<<<<< HEAD
            $this->db = new PDO("mysql:host=localhost;dbname=$dbName", "root", "");
=======
            $this->db = new PDO("mysql:host=localhost;dbname=$dbName", "root", "soufiayyoub");
>>>>>>> e2a6a47e9120f2e118e832e9d6dd30e52b8910f1

        } catch (Exception $ex) {
            echo $ex->getMessage();
            die();
        }

    }

    /**
     * Afficher les tableau
     **/
    public function afficherTables()
    {
        $query = "show tables";
        $stmt = $this->db->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_NUM);
        $tables = [];
        foreach ($result as $table) {
            foreach ($table as $t) {
                $tables[] = $t;
            }
        }
        return $tables;
    }
    /**
     * Creation de la table
     */

    public function creerTable($table, $columns, $types)
    {

        $str = "";
        foreach ($columns as $index => $column) {
            if ($index == 0) {
                $str .= "$column $types[$index]";
            } else {
                $str .= ",$column $types[$index]";
            }
        }
        $query = "create table $table($str)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
    }
    /**
     * Supression des tables
     */

    public function supprimerTable($table)
    {
        $query = "drop table $table";
        $stmt = $this->db->prepare($query);
        return $stmt->execute();

    }

    /**
     * Manipuler une table
     */
    public function table($tableName)
    {

        return new Table($tableName, $this->db);

    }
}
