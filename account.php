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
  <body
    style="
      background-color: #ecf0f1;
      background: url(./Image/teste2.jpg);
      width: 100%;
      height: 100%;
    "
  >
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="Itens_base">
            <form action="account.php" method="POST" class="form2">
              <div class="form-group">
                <div class="Item_Pic">
                  <div class="row">
                    <div class="col-12">
                      <h2 class="title3">Create Account</h2>
                    </div>
                  </div>
                  <label for="email" class="title2">Name</label>
                  <span class="icon2">*</span>
                  <i class="fas fa-user icon-modify"></i>
                  <input
                    type="text"
                    class="form-control"
                    id="name"
                    placeholder="Enter with your name"
                  />
                </div>
              </div>
              <div class="form-group">
                <div class="Item_Pic">
                  <label for="email" class="title2">Email</label>
                  <span class="icon2">*</span>
                  <i class="far fa-envelope icon-modify"></i>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    aria-describedby="emailHelp"
                    placeholder="Enter with your email"
                  />
                </div>
              </div>
              <div class="form-group">
                <div class="Item_Pic">
                  <label for="password" class="title2">Login</label>
                  <span class="icon2">*</span>
                  <input
                    type="text"
                    class="form-control"
                    id="login"
                    placeholder="Enter with some login"
                  />
                </div>
              </div>
              <div class="form-group">
                <div class="Item_Pic">
                  <label for="password" class="title2">Password</label>
                  <span class="icon2">*</span>
                  <i class="fas fa-lock icon-modify"></i>
                  <input
                    type="password"
                    class="form-control"
                    id="password"
                    placeholder="Enter with your password"
                  />
                  <li class="obsPassword">Ao menos 6 dígitos</li>
                </div>
              </div>
              <div class="form-group">
                <div class="Item_Pic">
                  <label for="password" class="title2">Telefone</label>
                  <i class="fas fa-phone icon-modify"></i>
                  <input
                    type="number"
                    class="form-control"
                    id="tel"
                    placeholder="Enter with your telefone"
                  />
                </div>
              </div>
              <!-- quando ela apertar ela é direcionada para o login -->
              <a href="index.php"><input type="button" class="btn btn-primary btn-block" id="btnUp" value="Sign up"></a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
