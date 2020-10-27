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

<body style="background-color: #ecf0f1">

<div class="container-fluid">
<div class="row">
<div class="col-12 title_Bar"><a href="../stock.php"><font color=white>Ideal Stock</font></a></div>
<div class="col-10 Tool_Bar"><a href="categoria.php"><font color=white>Add Categoria</font></a>-<a href="produto.php"><font color=white>Add Produto</font></a>-<a href="./relatorio.php"><font color=white>Visualizar Relatório</font></a></div>
</div>
	<div class="col-4 offset-4">
		<h2>Crud de Categorias</h2>
	</div>
</div>
<div class="col-md-6 offset-md-3 col-sm-10 offset-sm-1">
<form action="categoria.php" method="POST">
  <label for="nome">Nome da Categoria:</label><br>
	<input type="text" class="form-control" name="nome"><br>
  <label for="descricao">Descrição da Categoria:</label>
	<textarea name="descricao" class="form-control"></textarea>
	<br>
	<input type="submit" class="btn btn-primary" name="Cadastrar">
</form>
</div>
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
  echo '<div class="col-10 offset-1">
  <table class="table table-striped table tablel-hover table table-bordered table table-sm>
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
  echo '</table>
        </div>';

?>

</body>
</html>

