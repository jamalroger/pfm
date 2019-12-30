


<?php

spl_autoload_register(function ($class) {
    require_once '../../App/' . $class . '.php';
});

$databases = new Databases();
$databases_list = $databases->afficherBaseDeDonees();
if (isset($_GET['dbName']) && isset($_GET['tableName'])) {
    $tableName = $_GET['tableName']; 
    $dbName = $_GET['dbName'];
    $table = new Table($tableName, $dbName);
    $data = $table->selectionner();
    $data_cols = $table->getChamps();


}

?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title> Gestion des base des donnees</title>
  <?php require_once '../../public/includes/include.php'?>
</head>
<body>

<div class="container" style="justify-content:center">
       
        <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Les Base de donnees </div>

                        <div class="">
                                    <?php foreach ($databases_list as $db) {?>
                                            <div style="border-top:1px solid #eee;font-size:15px;padding:15px;<?=$_GET['dbName']==$db?"background:#cee6bf":""?>">
                                                <a href="../tables/index.php?dbName=<?=$db;?>"><?=$db;?> </a>

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
                    <div class="card"></div>
                        <div class="card-header">Les tables  <span> <a href=""> </a>  </span> </div>
                        <div class="">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <?php foreach($data_cols as $value) { ?>
                                        <th><?= $value; ?></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                 <?php foreach($data as $row) { ?>
                                        <tr>
                                            <?php foreach($data_cols as $value) {  ?>
                                                <td><?= $row[$value]; ?></td>
                                            <?php } ?>
                                        </tr>
                             <?php } ?>
                            </tbody>
                    </table>
                    <a href="./ajouter.php?tableName=<?= $_GET['tableName'] ?>&dbName=<?= $_GET['dbName'] ?>" class="btn btn-primary">Insérer une ligne</a>
                    
                    </div>
             </div>
        </div>
    </div>

 <!-- Modal -->

</body>
</html>










































