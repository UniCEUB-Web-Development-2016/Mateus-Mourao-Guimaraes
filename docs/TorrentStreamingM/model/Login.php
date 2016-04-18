<?php
class Login
{
    private $date;
    private $login;
    private $pass;
    
    public function __construct($date, $login, $pass)
    {
        $this->setDate($date);
        $this->setLogin($login);
        $this->setPassword($pass);
    }
    
    public function getdate()
    {
        return $this->date;
    }
    public function getLogin()
    {
        return $this->login;
    }
    public function getPass()
    {
        return $this->pass;
    }
    
    public function setdate($date)
    {
        $this->cpf = $date;
    }
    public function setLogon($login)
    {
        $this->login = $login;
    }
    public function setPass($pass)
    {
        $this->pass = $pass;
    }
}