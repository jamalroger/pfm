<?php
class Table {

    private $table;
    private $db;

    public function __construct($table,$db){
        $this->table = $table;
        $this->db = $db;
    }
    
    public function selectionner(){
        $query="select * from $this->table";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll();
    }

    public function delete($column,$operator,$value) {
        $query = "delete from $this->table where $column $operator '$value'";
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
    }
    
    public function modifier($column,$value,$condition){

            $query= "UPDATE $this->table set $column=? where $condition";

            $stmt = $this->db->prepare($query);

            return $stmt->execute([$value]);   
    }

   
    public function addLigne($array){
        $str = "";
        $firstValueCheck = false;
        foreach ($array as $columnName => $value) {

            if($firstValueCheck){
                $str.= ",'".$value."'";
            } else {
                $str.= "'".$value."'";
                $firstValueCheck = true;
            }
        }

        $query = "insert into $this->table values ($str)";

        $stmt = $this->db->prepare($query);
       return $stmt->execute();   
    }
}
