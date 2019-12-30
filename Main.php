<?php

spl_autoload_register(function ($class) {
    require_once './App/' . $class . '.php';
});

//    $client = new Table('clients',$db);
//    $client->ajouter([
//     'nom'=>"test 1",
//     'prenom'=>"test prenom 2",
//     'tele'=>"045frew2",
//     'pay'=>"ifraAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAne2",
// ]);
// echo "<pre>";

// print_r($client->selectionner());

// $client->modifier("nom","test moAAAAAAAAAAAAAAAAAAAAAAAAAAAAAdifier","nom='test'");


$db = new Table("clients","test");

var_dump($db->getChamps());





