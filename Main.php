

<?php
    require "./App/database_cnx.php";

   spl_autoload_register(function($class){
       require_once './App'.$class.'.php';
   });


   $client = new Table('clients',$db);

   $client->addLigne([
       'nom'=>"test",
       'prenom'=>"test prenom",
       'tele'=>"045frew",
       'pay'=>"ifrane",
   ]);







