<?php
class Table {

    private $table;
    private $db;

    public function __contstruct($table,$db){
        $this->table = $table;
        $this->db = $db;
    }
    
    public function selectionner(){
        $query="select * from $this->table";
    }

    public function delete($column,$value) {
        $query = "delete from $this->table where $column=?";
        $stmt = $db->prepare($query);
        $stmt->execute([$value]);
    }
    
    public function modifier($column,$value,$condition){

            $query= "UPDATE $this->table set $column=? where $condition";

            $stmt = $db->prepare($query);

           return $stmt->execute([$value]);   
    }

   
    public function addLigne($array){
        $str = "";
        $firstValueCheck = false;
        foreach ($array as $columnName => $value) {

            if($firstValueCheck){
                $str.= ",".$value;
            } else {
                $str.= $value;
                $firstValueCheck = true;
            }
        }

        $query = "insert into $this->table values $str";

        $stmt = $db->prepare($query);
        $stmt->execute();   
    }
}
