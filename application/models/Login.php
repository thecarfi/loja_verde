<?php
namespace Application\models;

class Login
{

    private $login;
    private $senha;
    public function __construct($login, $senha)
    {
        $this->login = $login;
        $this->senha = $senha;
    }
    
    public function getLogin()
    {
        return $this->login;
    }
    public function getSenha()
    {
        return $this->senha;
    }
    public function setLogin($login)
    {
        $this->nome = $login;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
}