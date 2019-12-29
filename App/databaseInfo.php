<?php

spl_autoload_register(function ($class) {
    require_once './App/' . $class . '.php';
});
if(isset($_GET['dbName'])) {
    $dbName = $_GET['dbName'];
    $database = new Database($dbName);
    $tables = $database->afficherTables();
}
?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Gestion des base des donnees </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="./public/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
            <div class="col-md-4">  
                <h1>Les Base de donnees</h1>
                <ul class="list-group">
                <?php foreach($databases_list as $db) { ?>
                    <li class="list-group-item"><?=$db; ?></li>
                <? }?>
                </ul>
            </div>
     

        <div class="col-md-8">
            fffffffffff
        </div>
    </div>
</div>
<script src="./public/js/script.js"></script>
</body>
</html>