<?php

class Databases
{
    private $dbs;
    public function __construct()
    {
        try {
<<<<<<< HEAD
            $this->dbs = new PDO("mysql:host=MacBook-Pro-de-abdelali.local;", "root", "");
=======
            $this->dbs = new PDO("mysql:host=MacBook-Pro-de-abdelali.local;", "root", "soufiayyoub");
>>>>>>> e2a6a47e9120f2e118e832e9d6dd30e52b8910f1
        } catch (Exception $ex) {
            echo $ex->getMessage();
            die();
        }

    }        
    

    /**
     * Affichage toutes les bases de donnees
     */
    public function afficherBaseDeDonees()
    {
        $query = "show databases";
        $stmt = $this->dbs->query($query);
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
     * Ajout de la base de donnees
     */
    public function ajouterBaseDeDonees($dbname)
    {

        $query = "create database $dbname";
        $stmt = $this->dbs->query($query);
        return $stmt->execute();

    }
    /**
     *suppression de la base de donnees
     */
    public function supprimerBaseDeDonees($dbName)
    {
        $query = "drop database $dbName";
        $stmt = $this->dbs->query($query);
        return $stmt->execute();
    }

    /**
     * choix de la base de donnees
     */
    public function choisirBaseDeDonees($dbName)
    {
        return new Database($dbName);
    }

}
