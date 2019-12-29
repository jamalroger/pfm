<?php 
if(isset($_GET['dbName']) && isset($_GET['tableName'])) {
    
spl_autoload_register(function ($class) {
    require_once '../../App/' . $class . '.php';
});

$db = $_GET['dbName'];
$table = $_GET['tableName'];

$database = new Database($db);
$database->supprimerTable($table);
header('Location: ' . $_SERVER['HTTP_REFERER']);

}