<?php

spl_autoload_register(function ($class) {
    require_once '../../App/' . $class . '.php';
});



if(!empty($_POST)){

     if(!empty($_POST["table_name"]) && !empty($_POST["fields"]) && !empty($_POST["types"]) && !empty($_POST['db_name'])){
         $table_name = $_POST["table_name"];
         $array_types = (array) $_POST["types"];
         $array_fields = (array) $_POST["fields"];
         $database = new Database($_POST["db_name"]);
         $database->creerTable($table_name, $array_fields, $array_types);
         header('Location: ' . $_SERVER['HTTP_REFERER']);


     } else {

       

        echo "please correct your data";
     }
        


}


?>
