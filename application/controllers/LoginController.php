<?php

use Application\core\Controller;
use Application\dao\LoginDAO;
use Application\models\Login;
use Application\views\layout;

class LoginController extends Controller
{


    public function acessar()
    {   
        $login = $_POST['login'];
        $senha = $_POST['senha'];
       
        $usuario = new Login($login, $senha);

        $usuarioDAO = new LoginDAO();
        $usuarioDAO->BuscaLogin($usuario);

        
        if (isset($usuarioDAO)) {
            $this->view('login/index');
            
        }else{
            $this->view('./login/index', ["msg" => "erro"]);
            
        }
        
    }

}
?>