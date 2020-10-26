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

.testandoAgain{
  margin-left:30px;
}


</style>

<body style="background-color: #ecf0f1">

<div class="container-fluid">
<div class="row">
<div class="col-12 title_Bar"><a href="../stock.php"><font color=white>Ideal Stock</font></a></div>
<div class="col-10 Tool_Bar"><a href="Admin/categoria.php"><font color=white>Add Categoria</font></a>-<a href="Admin/produto.php"><font color=white>Add Produto</font></a>-<a href="./relatorio.php"><font color=white>Visualizar Relatório</font></a></div>
</div>
	<div class="col-4 offset-4">
		<h2>Crud de Produtos</h2>
	</div>
</div>
<div class="col-md-6 offset-md-3 col-sm-10 offset-sm-1">
<form action="produto.php" method="POST">
  <label for="nome">Nome do Produto:</label><br>
	<input type="text" class="form-control" name="nome"><br>
  <label for="descricao">Descrição do Produto:</label><br>
	<textarea name="descricao" class="form-control"></textarea><br>
  <label for="marca">Marca:</label><br>
	<input type="text" class="form-control" name="marca"><br>
  <label for="valor">Valor:</label><br>
  <input type="number" class="form-control" name="valor"/><br>
  <label for="dval">Data de Validade:</label><br>
	<input type="date" class="form-control" name="dval"><br>
  <label for="qtd">Quantidade:</label><br>
	<input type="number" class="form-control" name="qtd"></input><br>
  <label for="qtent">Qtd de Entrada:</label><br>
	<input type="number" class="form-control" name="qtent"><br>
  <label for="qtsai">Qtd de Saida</label><br>
	<input type="number" class="form-control" name="qtsai"></input><br>
  <label for="dtent">Data de Entrada:</label><br>
	<input type="date" class="form-control" name="dtent"><br>
  <label for="dtsai">Data de Saida</label><br>
	<input type="date" class="form-control" name="dtsai"></input><br>
  <label for="peso">Peso:</label><br>
	<input type="number" class="form-control" name="peso"><br>
  <label for="largura">Largura:</label><br>
  <input type="number" class="form-control" name="largura"/><br>
  <label for="comp">Comprimento:</label><br>
	<input type="number" class="form-control" name="comp"><br>
  <label for="altura">Altura:</label><br>
	<input type="number" class="form-control" name="altura"></input><br>
  <label for="dtat">Data Atualização:</label><br>
	<input type="date" class="form-control" name="datu"><br>
  <label for="categorias">Categorias:</label><br>
  <div class="row">
  <div class="col-4 offset">
	  
	  <?php 
	  	$categorias=ListarCategorias();
        while($c=$categorias->fetch_array()){
        echo '<div class="row testandoAgain"><div class="col-4 offset-2>"><input type="checkbox" name="categoria" class="form-check-input form-control" id="C'.$c['cd_categoria'].'" value="'.$c['cd_categoria'].'"></div> 
       <div class="col-6"><label  class="form-control-lg " for="C'.$c['cd_categoria'].'">'.$c['nm_categoria'].'</label></div></div><br>';
      }
    ?>
  </div>  
  </div>
	<input type="submit" class="btn btn-primary" name="Cadastrar">
</form>
</div>
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

$produto = ListarProdutos(null,null);
  echo '<table class="table table-striped table tablel-hover table table-bordered table table-sm>
        <thead  class="thead-dark">
        <tr>
        <th scope="col">Código</th>
        <th scope="col">#</th>
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
        </tr>
        </thead>'
        ;
  while($p = $produto->fetch_array()){
  echo '<tbody>
        <tr>
        <th scope="row">'.$p['cd_produto'].'</th>
        <td>
        <a href="?excluir='.$p['cd_produto'].'">Excluir</a>
        <a href="foto.php?foto='.$p['cd_produto'].'">Adicionar Foto</a>
        </td>  
        <td>'.$p['nm_produto'].'</td>
        <td>'.$p['ds_produto'].'</td>
        <td>'.$p['marca_produto'].'</td>
        <td>'.$p['vl_produto'].'</td>
        <td>'.$p['dt_validade'].'</td>
        <td>'.$p['qt_produto'].'</td>
        <td>'.$p['entrada_produto'].'</td>
        <td>'.$p['saida_produto'].'</td>
        <td>'.$p['dt_entrada_produto'].'</td>
        <td>'.$p['dt_saida_produto'].'</td>
        <td>'.$p['peso_produto'].'</td>
        <td>'.$p['largura_produto'].'</td>
        <td>'.$p['comp_produto'].'</td>
        <td>'.$p['altura_produto'].'</td>
        <td>'.$p['dt_atualizacao'].'</td>';
        
        $produ = ListaCategoriaProduto();
        while($pr = $produ->fetch_array()){
          echo '<td>'.$pr['nm_categoria'].'</td>';
        }
        echo '
      </tbody>';
  }
  echo '</table>';

?>

</body>
</html>

