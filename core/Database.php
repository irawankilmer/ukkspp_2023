<?php 

class Database 
{
    public function connect() : Object
    {
        return mysqli_connect('localhost', 'root', '', 'ukk_spp');
    }

    public function getOne(String $table, String $where, String $value)
    {
        $result = mysqli_query($this->connect(), "SELECT * FROM $table WHERE $where = '$value'");

        return mysqli_fetch_assoc($result);
    }

    public function queryIUD($query)#
    {
        mysqli_query($this->connect(), $query);

        return mysqli_affected_rows($this->connect());
    }
}
