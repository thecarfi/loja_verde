<?php
$base = __DIR__;
include $base . '\..\layout\menu.php';

?>
<html>

<head>

</head>

<body>
    <h1> Listar usuarios </h1>
    <hr />
    <?php if (isset($data['msg'])) { ?>
        <div class="alert alert-danger" role="alert"> Sucesso </div>
    <?php } ?>
    <p> <a href="/usuario/cadastrar"> Adicionar usuario </a> </p>


    <form action="/usuario/pesquisaUsuario/" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="login" placeholder="Pesquise por um usuário"
                aria-describedby="button-addon2">
            <input type="submit" class="btn btn-outline-secondary" value="Buscar" id="button-addon2">
        </div>
    </form>

    <table class="table">
        <thead>
            <th>Código</th>
            <th>Nome</th>
            <th>Login</th>
            <th>Senha</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php  foreach ($data['usuarios'] as $usuario) { ?>
                <tr>
                    <td>
                        <?= $usuario->getCodigo() ?>
                    </td>
                    <td>
                        <?= $usuario->getNome() ?>
                    </td>
                    <td>
                        <?= $usuario->getLogin() ?>
                    </td>
                    <td>
                        <?= $usuario->getSenha() ?>
                    </td>
                    <td>
                        <a href="/usuario/iniciarEditar/<?= $usuario->getCodigo() ?>">
                            EDITAR
                        </a>
                        <span>
                            <form action="/usuario/deletar" method="post">
                                <input type="hidden" value="<?= $usuario->getCodigo() ?>" name="codigo" />
                                <input type="submit" value="X" />
                            </form>
                        </span>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>



</body>

</html>