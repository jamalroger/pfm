<?php

class Databases
{
    private $dbs;
    public function __construct()
    {
        try {
            $this->dbs = new PDO("mysql:host=MacBook-Pro-de-abdelali.local;", "root", "root");
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
