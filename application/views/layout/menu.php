<?php
?>

<ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/home/index">Início</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/produto/"> Produto</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/usuario/"> Usuário </a>
  </li>

  <?php

  session_start();
  
  if (isset($_SESSION['login']) == true) {
    $login = $_SESSION['login'];
    
    
    echo "bem-vindo, $login";
  } else { ?>
    <li class="nav-item">
      <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
        aria-controls="offcanvasExample"> Login </a>
    </li>
  </ul>
  <?php
  }
  ?>



<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Faça login aqui...</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">

    <div class="dropdown mt-3">
      <form action="/login/acessar" method="POST">
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Login: </label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail3" name="login">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Senha: </label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" name="senha">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
      </form>
    </div>
  </div>
</div>