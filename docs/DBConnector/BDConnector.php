<?php

class DatabaseConnector
{
    

    private $ip, $dataname, $datatype, $port, $user, $password;
    public function __construct($ip, $dataname, $datatype, $port, $user, $password){
	this->$ip = $ip;
	this->$dataname = $dataname;
 	this->$banktype = $datatype
 	this->$port = $port;
 	this->$user = $user;
 	this->$password = $password;
       
    }
    public function connectdb(){
        mysql_connect(this->ip, this->dataname, this->datatype, this->port, this->user, this->password)
            OR die("There was a problem connecting to the database.");
        echo 'successfully connected to database<br />';
    }
    public function select($datatype){
        mysql_select_db($datatype)
            OR die("There was a problem selecting the database.");
        echo 'successfully selected datatype<br />';
    }
    public function disconnectdb(){
        mysql_close($this->connectdb())
            OR die("There was a problem disconnecting from the database.");
    }
}
