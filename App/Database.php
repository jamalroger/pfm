<?php

class Database {
    private $db;
    
    function __construct($dbName) {
        
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=$dbName","root","root");
        } catch(Exception $ex){
            echo $ex->getMessage();
            die();
        }
        
    }
    function showTables(){
        $query = "show tables";
        $stmt = $this->db->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_NUM);
        $tables=[];
        foreach($result as $table){
            foreach($table as $t){
                    $tables[]=$t;
            }
        }               
        return $tables;
    }

    function creerTable($table,$columns,$types){

        $str = "";
        foreach ($columns as $index => $column) {
            if($index == 0){
                $str.="$column $types[$index]";
            }else {
                $str.= ",$column $types[$index]";
            }
        }
        $query = "create table $table($str)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
    }
    
    function supprimerTable($table){
        $query = "drop table $table";
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
        
    }

    public function table($tableName){
        
       return new Table($tableName,$this->db);

    }
}