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
  <title>Gerenciamento de Produtos</title>
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
		<h2>Crud de Produtos</h2>
	</div>
</div>

<form action="produto.php" method="POST">
  <label for="nome">Nome do Produto:</label><br>
	<input type="text" name="nome"><br>
  <label for="descricao">Descrição do Produto:</label>
	<textarea name="descricao"></textarea><br>
  <label for="marca">Marca:</label><br>
	<input type="text" name="marca"><br>
  <label for="valor">Valor:</label>
  <input type="number" name="valor"/><br>
  <label for="dval">Data de Validade:</label><br>
	<input type="date" name="dval"><br>
  <label for="qtd">Quantidade:</label>
	<input type="number" name="qtd"></input><br>
  <label for="qtent">Qtd de Entrada:</label><br>
	<input type="number" name="qtent"><br>
  <label for="qtsai">Qtd de Saida</label>
	<input type="number" name="qtsai"></input><br>
  <label for="dtent">Data de Entrada:</label><br>
	<input type="date" name="dtent"><br>
  <label for="dtsai">Data de Saida</label>
	<input type="date" name="dtsai"></input><br>
  <label for="peso">Peso:</label><br>
	<input type="number" name="peso"><br>
  <label for="largura">Largura:</label>
  <input type="number" name="largura"/><br>
  <label for="comp">Comprimento:</label><br>
	<input type="number" name="comp"><br>
  <label for="altura">Altura:</label>
	<input type="number" name="altura"></input><br>
  <label for="dtat">Data Atualização:</label><br>
	<input type="date" name="datu"><br>
  <div class="row">
  <div class="col-4 offset-2">
	  <label for="categorias">Categorias:</label><br>
	  <?php 
	  	$categorias = ListarCategorias();
	  	while($c = $categorias->fetch_array()){
	  		echo '<input type="checkbox" name="categoria" value="'.$c['cd_categoria'].'">'.$c['nm_categoria'];
      }
    ?>
  </div>  
  </div>
	<input type="submit" class="btn btn-primary" name="Cadastrar">
</form>

</div>

<br>

<?php 

if($_POST){
  
  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];
  $marca = $_POST['marca'];
  $valor = $_POST['valor'];
  $Dval= $_POST['dval'];
  $Qtd = $_POST['qtd'];
  $Qt_entrada = $_POST['qtent'];
  $Qt_saida = $_POST['qtsai'];
  $Dt_entrada = $_POST['dtent'];
  $Dt_saida = $_POST['dtsai'];
  $peso = $_POST['peso'];
  $largura = $_POST['largura'];
  $comprimento = $_POST['comp'];
  $Altura = $_POST['altura'];
  $Datuali = $_POST['datu'];
  $categoria = $_POST['categoria'];
  CadastrarProduto($nome,$descricao,$marca,$valor,$Dval,$Qtd,$Qt_entrada,$Qt_saida,$Dt_entrada,$Dt_saida,$peso,$largura,$comprimento,$Altura,$Datuali,$categoria);
}

if(isset($_GET['excluir'])){
  DeletarProduto($_GET['excluir']);
}

$produto = ListarProdutos();
  echo '<table class="table table-striped table tablel-hover table table-bordered table table-sm>
        <thead  class="thead-dark">
        <tr>
        <th scope="col">Código</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">Marca</th>
        <th scope="col">Valor</th>
        <th scope="col">Data de Validade</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Quantidade de Entrada</th>
        <th scope="col">Quantidade de Saida</th>
        <th scope="col">Data de Entrada</th>
        <th scope="col">Data de Saida</th>
        <th scope="col">Peso</th>
        <th scope="col">Largura</th>
        <th scope="col">Comprimento</th>
        <th scope="col">Altura</th>
        <th scope="col">Data de Atualização</th>
        <th scope="col">Categorias</th>
        <th scope="col">#</th>
        </tr>
        </thead>'
        ;
  while($p = $produto->fetch_array()){
  echo '<tbody>
        <tr>
        <th scope="row">'.$p['cd_produto'].'</th>
        <td>'.$p['nm_produto'].'</td>
        <td>'.$p['ds_produto'].'</td>
        <td>'.$p['marca_produto'].'</td>
        <td>'.$p['vl_produto'].'</td>
        <td>'.$p['dt_validade'].'</td>
        <td>'.$p['qt_produto'].'</td>
        <td>'.$p['entrada_produto'].'</td>
        <td>'.$p['saida_produto'].'</td>
        <td>'.$p['dt_entrada_produto'].'</td>
        <td>'.$p['ds_produto'].'</td>
        <td>'.$p['marca_produto'].'</td>
        <td>'.$p['vl_produto'].'</td>
        <td>
        <a href="?excluir='.$c['cd_categoria'].'">Excluir</a>
        </td>      
      </tbody>';
  }
  echo '</table';

?>

</body>
</html>

