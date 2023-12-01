<?php
namespace Application\dao;

use Application\models\Login;

class LoginDAO
{

    // Retrieve (R)
    public function BuscaLogin($usuario)
    {

        $login = $usuario->getLogin();
        $senha = $usuario->getSenha();


        $conexao = new Conexao();
        $conn = $conexao->getConexao();
        $SQL = "SELECT login FROM usuarios WHERE login = '$login' and senha = '$senha'";
        
        $result = $conn->query($SQL);
        
        if ($result->num_rows > 0) {

            $acessado = $result->fetch_assoc();

            print_r("o resultado é: "); print_r($acessado);
            if(isset($acessado)){

                print_r("passou por aqui");
                return true;
            }
            
            return false;
        } else {
            return false;
        }
    }


}


?>