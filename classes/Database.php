<?php

class Database
{
    private $connection;
    
    public function __construct($host, $user, $password, $name)
    {
        $this->connection = mysql_connect($host, $user, $password, $name) or die('Could not connect to Database: ' . mysql_error());
        mysql_select_db($name, $this->connection);
    }
    
    
    public function query($sql)
    {
        return mysql_query($sql, $this->connection);
    }
    
    public function getConnection()
    {
        return $this->connection;
    }
}