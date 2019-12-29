<?php
    spl_autoload_register(function ($class) {
        require_once '../../App/' . $class . '.php';
    });

    if(isset($_GET['tableName']) && isset($_GET['dbName'])){
        $dbName = $_GET['tableName'];
        $tableName = $_GET['dbName'];
        $table = new Table($dbName,$tableName);
        $data = $table->selectionner();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../../public/includes/include.php'); ?>
    <title>modifier table <?php echo $tableName;?></title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                <h1 class="text-center">hello world</h1>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="form">
                <input type="text" class="btn btn-primary btn-block" value="Modifier">
                </form>
            </div>
        </div>
    </div>
    <script>
        var data = <?php echo json_encode($data); ?>;
    </script>
    <script src="../../public/js/script.js"></script>
</body>
</html>