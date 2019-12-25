<?php
/// db test;
// user root'
// pass root;
// table clients(id,nom,prenom,tele,pay);
$db = null;
try {
    $db = new PDO("mysql:host=localhost;dbname=test","root","root");
} catch(Exception $ex){
    echo $ex->getMessage();
    die();
}
