<?php
class Table
{

    private $table;
    private $db;

    public function __construct($table, $db)
    {
        $this->table = $table;
        $this->db = new PDO("mysql:host=localhost;dbname=$db","root","");
    }

    /**
     * Selectionner avec condition
     */
    public function selectionnerAvecCondition($cols, $operator, $val)
    {

    }

    /**
     * Selectionner une ou plusieurs
     */
    public function selectionner($columns = [], $condition = "")
    {
        if (empty($columns)) {
            $query = "select * from $this->table";
        } else {
            $columns = implode(',', $columns);
            $query = "select $columns from $this->table";
        }
        if (!empty($condition)) {
            $query .= " where $condition";
        }
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Supprimer une colonne avec condition
     */
    public function supprimer($column, $operator, $value)
    {
        $query = "delete from $this->table where $column $operator '$value'";
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
    }

    /**
     * Modification du colonne avec condition
     */
    public function modifier($column, $value, $id)
    {

        $query = "UPDATE $this->table set $column=? where id =$id";

        $stmt = $this->db->prepare($query);

        return $stmt->execute([$value]);
    }

    /**
     * Ajouter une ligne a une table
     */
    public function ajouter($array)
    {
        foreach ($array as $index => $value) {
            $array[$index] = "'" . $value . "'";
        }
        $str = implode(',', $array);

        $query = "insert into $this->table values ($str)";

        $stmt = $this->db->prepare($query);

        return $stmt->execute();
    }

public function getChamps(){

        $query = "describe $this->table";

        $stmt = $this->db->query($query);

       return $result = $stmt->fetchAll(PDO::FETCH_NUM);
}
}
