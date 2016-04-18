<?php
class UserRegister
{
    private $name;
    private $email;
    private $userlogin;
    private $pass;
    
    public function __construct($name, $email, $userlogin, $pass)
    {
        $this->setName($name);
        $this->setEmail($email);
        $this->setUserLogin($userlogin);
        $this->setPass($pass);
    }
   
    public function getName()
    {
        return $this->name;
    }
     public function getEmail()
    {
        return $this->email;
    }
    public function getUserLogin()
    {
        return $this->userlogin;
    }
    public function getPass()
    {
        return $this->pass;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setUserLogin($userlogin)
    {
        $this->userlogin = $userlogin;
    }
    public function setPass($pass)
    {
        $this->pass = $pass;
    }
}