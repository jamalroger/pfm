<?php

spl_autoload_register(function ($class) {
    require_once '../../App/' . $class . '.php';
});
$error = "";
if (isset($_GET['dbName']) && isset($_GET['tableName'])) {
    $table = new Table($_GET['tableName'], $_GET['dbName']);
    $data = $table->selectionner();
    $data_cols=[];
    $test = 0;
    foreach($data[0] as $key=>$value){
        $data_cols[]=$key;
    }
    for ($i=0; $i <count($data_cols) ; $i++) { 
        if(isset($_POST[$data_cols[$i]]) && !empty($_POST[$data_cols[$i]])) {
            $test++;
        }
    }

    if(count($data_cols) == $test){
        $insertion = [];
        foreach ($data_cols as $value) {
           $insertion[] = $_POST[$value];
        }
        $table->ajouter($insertion);
        header("Location:http://192.168.43.115/project/main/table/index.php?tableName=".$_GET['tableName']."&dbName=".$_GET['dbName']);
    }else{
            $error = "Les champs sont obligatoires";
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once '../../public/includes/include.php'?>
    <title>Ajout ligne</title>
</head>
<body>
    
    <div class="container">
    <!-- <?php if(isset($error) && $error != ""){ ?>
            <div class="alert alert-danger" id="alert"><?= $error ?></div>
            <?php   } ?> -->
            <h1 class="text-center">Ajouter une ligne</h1>
        <div class="row justify-content-center">
            <div class="col-sm-5">
                <form class="form" action="#" method="POST">
                    <?php
                        foreach ($data_cols as $value) {
                            ?>
                            <div class="form-group">
                                <label class="text-capitalize" for="<?= $value ?>"><?= $value ?>:</label>
                                <input type="text" id=<?= $value ?> name=<?= $value ?> class="form-control">
                            </div>
                        <?php   
                        }
                    ?>
                    <input type="submit" class="btn btn-success btn-block" value="Enregistrer">
                </form>
            </div>
        </div>
    </div>
    <script>
        // let error = "";
        // function hideAlert(){
        //     const v = document.getElementById('alert');
        //     if(error == ""){
        //         v.style.display = 'none';
        //     }else{
        //         v.style.display = 'none';
        //     }
        //     console.log(v);

        // }
        // hideAlert();
        // document.onload = {
        
        // }
    </script>
</body>
</html>