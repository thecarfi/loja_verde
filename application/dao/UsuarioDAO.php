<?php
namespace Application\dao;

use Application\models\Usuario;

class UsuarioDAO
{
    // Create (C)
    public function salvar($usuario)
    {
        $conexao = new Conexao(); // 1- Instancia o Objeto
        // 2- Recebe a conexão
        $conn = $conexao->getConexao();
        // 3 - Receber os dados da outra camada
        $nome = $usuario->getNome();
        $login = $usuario->getLogin();
        $senha = $usuario->getSenha();
        // 4 - Monta o SQL
        $SQL = "INSERT INTO usuarios( nome, login, senha) 
    VALUES ('$nome', '$login', '$senha')";
    
        if ($conn->query($SQL) === TRUE) {
            return true;
        } else {
            echo "Error: " . $SQL . "<br />" . $conn->error;
            return false;
        }

    }
    public function findAll()
    {
        // 1 - Instancia
        $conexao = new Conexao();
        // 2 - Recebe 
        $conn = $conexao->getConexao();
        
        $SQL = "SELECT codigo,nome,login,senha FROM usuarios";
        print_r($SQL);
        $result = $conn->query($SQL);
        $usuarios = [];
        while ($row = $result->fetch_assoc()) {
            $usuario = new Usuario($row["nome"], $row["login"], $row["senha"]);
            $usuario->setCodigo($row["codigo"]);
            array_push($usuarios, $usuario);
        }
        return $usuarios;
    }
    // Retrieve (R)
    public function findById($codigo)
    {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();
        $SQL = "SELECT codigo,nome,login,senha FROM usuarios WHERE codigo = '$codigo'";
        print_r($SQL);
        $result = $conn->query($SQL);
        $row = $result->fetch_assoc();
        $usuario = new Usuario($row["nome"], $row["login"], $row["senha"]);
        $usuario->setCodigo($row["codigo"]);
        return $usuario;
    }
    public function BuscaUsuario($nome)
    {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();
        $SQL = "SELECT codigo, nome, login, senha FROM usuarios WHERE nome like '%$nome%'";
        
        $result = $conn->query($SQL);
        $row = $result->fetch_assoc();
        $usuario = new Usuario($row["nome"], $row["login"], $row["senha"]);
        $usuario->setCodigo($row["codigo"]);
        print_r($usuario);  
        return $usuario;
    }
    // Update (U)
    public function atualizar($usuario)
    {

        // Criar o conexao
        $conexao = new Conexao();
        $conn = $conexao->getConexao();
        
        // pega os dados
        $codigo = $usuario->getCodigo();
        $nome = $usuario->getNome();
        $login = $usuario->getLogin();
        $senha = $usuario->getsenha();
        $SQL = "UPDATE usuarios SET nome = '$nome', login = '$login',
   senha = '$senha' WHERE codigo =" . $codigo;
    print_r($SQL."   < -- >  ");
        if ($conn->query($SQL) == TRUE) {
            return $this->findById($codigo);
        }
        print_r("Error: " . $SQL . "<br />" . $conn->error);
        return $usuario;
    }
    // Delete (D)
    public function deletar($id)
    {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();

        $SQL = "delete from usuarios where codigo = " . $id;
        if ($conn->query($SQL) === TRUE) {
            return true;
        }
        return false;
    }

}


?>