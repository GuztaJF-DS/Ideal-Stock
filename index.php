<?php include('./Admin/conexao.php');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <script defer src="./Js/jquery-3.3.1.min.js"></script>
    <script defer src="./Js/script.js"></script>
    <link rel="stylesheet" href="./Css/style.css" />
    <link rel="stylesheet" href="./Css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
      integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay"
      crossorigin="anonymous"
    />
  </head>
  <body style="background-color: #ecf0f1">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="Login_Part">
          <div class="Itens_base">
            <img src="./Image/logo.png" class="img" />
            <form action="index.php" method="POST" class="form">
              <div class="form-group">
                <div class="Item_Pic">
                  <div class="row">
                    <div class="col-12">
                      <h2 class="title3">Ideal Stock</h2>
                    </div>
                  </div>
                  <label for="email" class="title2">UserName</label>
                  <i class="far fa-envelope icon-modify"></i>
                  <input type="text" class="form-control" name="login" aria-describedby="emailHelp" placeholder="Enter with your login"/>
                </div>
              </div>
              <div class="form-group">
                <div class="Item_Pic">
                  <label for="password" class="title2">Password</label>
                  <i class="fas fa-lock icon-modify"></i>
                  <input
                    type="password"
                    class="form-control"
                    name="password"
                    placeholder="Enter with your password"
                  />
                </div>
              </div>
              <div class="row">
                <div class="col-8 offset-3">
                  <a href="account.php" class="create">Create Account</a>
                  <i class="fas fa-angle-double-right icon-modify"></i>
                </div>
              </div>
              <input type="submit" class="btn btn-primary btn-block" name="Login" id="Login" value="Sign in">               
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php
      if(isset($_POST['Login'])){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $correct=false;
        $usuario = ListarUsuario();
        while($s = $usuario->fetch_array()){
          if($s['login_user'] === $login && $s['senha_user'] === $password){
            $correct=true;
            echo ("<script>
                window.location.href='stock.php';
                </script>");
          }
        }
        if($correct!=true){
              echo("Login ou senha incorretos!");
            }
      }
    ?>
  </body>
</html>
