.<?php

spl_autoload_register(function ($class) {
    require_once './App/' . $class . '.php';
});
if(isset($_GET['dbName'])) {
    $database = new Database($_GET['dbName']);
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
    <div clas="row">
                
                <div class="col-md-8">
                        <div class="form-group">
                            <label for="usr"> Create Table :</label>
                            <input type="text" class="form-control" placeholder="Database name" id="usr">
                        </div>
                </div>
                <div class="col-md-2">
                    <input type="submit" class="btn btn-primary" value="Create ">
                </div>
        </div>
    <div class="row">
            <div class="col-md-4">  
                <h1>Les Base de donnees</h1>
                <ul class="list-group">
                <?php foreach($databases_list as $db) { ?>
                    <li class="list-group-item">
                        <a href="/databaseInfo.php?dbName=<?=$db; ?>"><?=$db; ?></a>
                    </li>
                <? }?>
                </ul>
            </div>
     

        <div class="col-md-8">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">nom</th>
                <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tables as $table) { ?>
                <tr>
                <td><?= $table; ?></td>
                <td>
                    <a href="#" class="btn btn-warning">Modifier</a>
                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#<?= $table; ?>">Supprimer</a>
                

                    <!-- Modal -->
                    <div class="modal fade" id="<?= $table; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Suppression du table</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Voulez vous supprimer cette table
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="#" class="btn btn-primary">Supprimer</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
</div>

<script src="./public/js/script.js"></script>
</body>
</html>                                      