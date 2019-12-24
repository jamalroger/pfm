<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=","root","");
} catch(Exception $ex){
    echo $ex->getMessage();
    die();
}