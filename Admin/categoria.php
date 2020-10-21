<?php include('conexao.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../Css/bootstrap.min.css" />
  <link rel="stylesheet" href="../Css/style.css" />
  <script defer src="./Js/jquery-3.3.1.min.js"></script>
  <script defer src="./Js/script.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerenciamento de Categorias</title>
</head>

<style>
h2{
  color:red;
  font-weight:bold;
}

</style>

<body>

<div class="container-fluid">
<div class="row">
	<div class="col-md-6 offset-4">
		<h2>Crud de Categorias</h2>
	</div>
</div>

<form action="categoria.php" method="POST">
  <label for="nome">Nome da Categoria:</label><br>
	<input type="text" name="nome"><br>
  <label for="descricao">Descrição da Categoria:</label>
	<textarea name="descricao"></textarea>
	<br>
	<input type="submit" class="btn btn-primary" name="Cadastrar">
</form>

</div>

<br>

<?php 

if($_POST){
  
  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];
  CadastrarCategoria($nome,$descricao);
}




if(isset($_GET['excluir'])){
  DeletarCategoria($_GET['excluir']);
}

$categoria = ListarCategorias();
  echo '<table class="table table-striped table tablel-hover table table-bordered table table-sm>
        <thead  class="thead-dark">
        <tr>
        <th scope="col">Código</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">#</th>
        </tr>
        </thead>'
        ;
  while($c = $categoria->fetch_array()){
  echo '<tbody>
        <tr>
        <th scope="row">'.$c['cd_categoria'].'</th>
        <td>'.$c['nm_categoria'].'</td>
        <td>'.$c['ds_categoria'].'</td>
        <td>
        <a href="?excluir='.$c['cd_categoria'].'">Excluir</a>
        </td>      
      </tbody>';
  }
  echo '</table';

?>

</body>
</html>

