<?php

spl_autoload_register(function ($class) {
    require_once './App/' . $class . '.php';
});
$databases = new Databases();
$databases_list = $databases->afficherBaseDeDonees;
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
        <h1>Base de donnees</h1>
        <div class="col-md-12">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Nom</th>
                <th scope="col">Tableaux</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($databases_list as $key->$db) { ?>
                <tr>
                <th><?php echo $db ?></th>
                <td></td>
                <td>
                    <a href="" class="btn btn-warning">Modifier</a>
                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop<?php echo $key; ?>">Supprimer</a>
                    <div class="modal fade" id="staticBackdrop<?php echo $key; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Suppression du base de donnee</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Voullez vous supprimer cette base de donnee
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="button" class="btn btn-primary">Supprimer</button>
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