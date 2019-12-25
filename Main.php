<?php
    require "./App/database_cnx.php";

   spl_autoload_register(function($class){
       require_once './App/'.$class.'.php';
   });

   $client = new Table('clients',$db);


//    $client->addLigne([
//     'nom'=>"test 1",
//     'prenom'=>"test prenom 2",
//     'tele'=>"045frew2",
//     'pay'=>"ifrane2",
// ]);
// echo "<pre>";

print_r($client->selectionner());

$client->modifier("nom","test modifier","nom='test'");

$client->delete("nom","=","test 1");






