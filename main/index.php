<?php

spl_autoload_register(function ($class) {
    require_once '../App/' . $class . '.php';
});
$databases = new Databases();

if (!empty($_POST))  {
    // suprimer database
        if ((empty($_POST['create_dbname']) || strpos($_POST['create_dbname'], " "))) {
                $create_err = "please enter a correct db name";
        } else {

            $databases->ajouterBaseDeDonees($_POST['create_dbname']);
        }

        // suprimer database
        if (!empty($_POST['delete_dbname'])){
              $create_err ="";
              $databases->supprimerBaseDeDonees($_POST['delete_dbname']);
        }
    
}

$databases_list = $databases->afficherBaseDeDonees();

?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title> Gestion des base des donnees</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="./public/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="justify-content:center">
       <label for="usr">Create database:</label>
       <?php if (!empty($create_err) ) {?>
              <div class="alert alert-danger">
                  <?=$create_err?>

             </div>
       <?php }?>
       <form action="./" method="post">
         <div class="row">
                <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="create_dbname" class="form-control" placeholder="Database name" id="usr">
                        </div>
                </div>
                <div class="col-md-4">
                    <input type="submit" class="btn btn-primary" value="Create">
                </div>
        </div>
        </form>
        <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Les Base de donnees </div>

                        <div class="">
                                    <?php foreach ($databases_list as $db) {?>
                                            <div style="border-top:1px solid #eee;font-size:15px;padding:15px">
                                                <a href="tables/index.php?dbName=<?=$db;?>">=><?=$db;?> </a>

                                                <a href="#" class="btn btn-danger" style="float:right" data-toggle="modal" data-target="#<?=$db;?>">Supprimer</a>
                                                <div class="modal fade" id="<?=$db;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                       <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Suppression du database</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Voulez vous supprimer cette databases
                        </div>
                        <div class="modal-footer">
                            <form action="./" method="post">
                                  <input type="hidden" name="delete_dbname" value="<?=$db;?>">
                                  <input type="submit"  name="submit" class="btn btn-danger" value="suprimer">
                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                        </div>
          </div>
       </div>
 </div>

                                            </div>
                                        <?}?>
                                </ul>
                        </div>
                        </div>
                </div>
                    <div class="col-md-8" style="padding:100px">
                        <h2>Choisir une base de donnees ??</h2>
                    </div>
        </div>
    </div>

    

 <!-- Modal -->
 
<script src="./public/js/script.js"></script>
</body>
</html>