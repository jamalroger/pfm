<?php

spl_autoload_register(function ($class) {
    require_once '../../App/' . $class . '.php';
});

$databases = new Databases();
$databases_list = $databases->afficherBaseDeDonees();
if (isset($_GET['dbName'])) {
    $database = new Database($_GET['dbName']);
    $tables = $database->afficherTables();
    $data = $tables;

}
$dbName = $_GET['dbName'];

?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title> Gestion des base des donnees</title>
  <?php require_once('../../public/includes/include.php')?>
</head>
<body>

<div class="container" style="justify-content:center">
       <label for="usr">Create Table:</label>
       <?php if (!empty($create_err)) {?>
              <div class="alert alert-danger">
                  <?=$create_err?>

             </div>
       <?php }?>
       <form action="./" method="post">
         <div class="row">
                <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="create_dbname" class="form-control" placeholder="Table name" id="usr">
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
                                                <a href="./?dbName=<?=$db;?>">=><?=$db;?> </a>

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
                    <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Les tables</div>
                        <div class="">
                        <table class="table table-striped">
                             <thead>
                                    <tr>
                                        <th>Nom Table </th>
                                        <th>Supprimer</th>
                                    </tr>
                            </thead>
                                <tbody  >
                               <?php if (isset($tables)) {
                                          foreach ($tables as $table) {?>
                                          <a href="../table/index.php?tableName=<?=$table;?>&dbName=<?=$db?>">
                                            <tr>
                                                    <td>
                                                     <a href="../table/index.php?tableName=<?=$table;?>&dbName=<?=$dbName?>"> <?=$table;?></a>
                                                     </td>
                        
                                                    <td>  
                                                        <a href="#" class="btn btn-danger" data-toggle="modal"  data-target="#<?=$table;?>">Supprimer</a>
                                                         <!-- Modal -->
                                <div class="modal fade" id="<?=$table;?>" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Suppression du
                                                    table</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Voulez vous supprimer cette table
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">
                                                    Close
                                                </button>
                                                <a href="supprimerTable.php?dbName=<?=$db;?>&tableName=<?=$table;?>"
                                                   class="btn btn-danger">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                                    </td>
                                         </tr>
                                          </a>
                                <?php }} ?>
                            </tbody>
                    </table>
                    </div>
             </div>
        </div>
    </div>
  
 <!-- Modal -->
 <script>
        var data = <?php echo json_encode($data); ?>;
    </script>
<script src="./public/js/script.js"></script>
</body>
</html>



























