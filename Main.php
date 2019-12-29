<?php

spl_autoload_register(function ($class) {
    require_once './App/' . $class . '.php';
});

//    $client = new Table('clients',$db);

//    $client->ajouter([
//     'nom'=>"test 1",
//     'prenom'=>"test prenom 2",
//     'tele'=>"045frew2",
//     'pay'=>"ifrane2",
// ]);
// echo "<pre>";

// print_r($client->selectionner());

// $client->modifier("nom","test modifier","nom='test'");

// $client->supprimer("nom","=","test 1");

// $db = new Database("test");

// $db->creerTable("test_3",['nom','prenom'],['text','text']);

// $db->table("clients")->ajouter(["jamal","belharradi","is","beautiful"]);

$dbs = new Databases();


var_dump($dbs->afficherBaseDeDonees());
