<?php
namespace Application\models;

class Usuario
{
    private $codigo;
    private $nome;
    private $login;
    private $senha;
    public function __construct($nome, $login, $senha)
    {
        $this->nome = $nome;
        $this->login = $login;
        $this->senha = $senha;
    }
    
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getNome()
    {
        return $this->nome;
    }

    public function getLogin()
    {
        return $this->login;
    }
    public function getSenha()
    {
        return $this->senha;
    }
}