<?php
class Db{
    protected static $connection;
    //connect
    public function connect(){
        if(!isset(self::$connection)) {
            self::$connection = new mysqli('localhost', 'pradhars_praveen', 'chicken65', 'pradhars_alpr');
        }
        if(self::$connection == false){
            echo mysqli_connect_error();
            return false;
        }
        return self::$connection;
    }
    //query
    public function query($query){
        $connection = $this->connect();
        $result = $connection->query($query);
        return $result;
    }
    //selecting
    public function select($query){
        $rows = array();
        $result = $this->query($query);
        if($result == false){
            return false;
        }
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        return $rows;
    }
    //returning error
    public function error(){
        $connection = $this->connect();
        return $connection->error;
    }
    //sql injection
    public function quote($value,$type){
        $connection = $this->connect();
        return "$type".$connection->real_escape_string($value)."$type";
    }
};
?>