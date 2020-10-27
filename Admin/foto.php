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
  <title>Gerenciamento de Fotos</title>
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
        <div class="col-md-6 col-sm-12 offset-md-3 offset-sm-0">
        <h2>Gerenciamento de Fotos</h2>
            <form action="foto.php?foto=<?php echo $_GET['foto'];?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_produto" value="<?php echo $_GET['foto'];?>">
            Enviar nova foto:<br>
            <div class="input-group mb-3">
                <input type="file" class="custom-file-input" id="Input" name="foto"value="foto"><br>
                <label class="custom-file-label" for="Input">Escolher arquivo</label>
                </div><br>
                <input type="submit" class="btn btn-primary mt-3 btn-block" value="Cadastrar" name="Cadastrar">
            </form>
        </div>
    </div>
</div>
    
</body>
</html>
<?php
if(isset($_GET['foto'])){
    if($_POST){
        $foto='Image/Produto/'.$_POST['id_produto'].$_FILES['foto']['name'];
        $destino='../'.$foto;
        $fotoTmp=$_FILES['foto']['tmp_name'];
        if(move_uploaded_file($fotoTmp,$destino)){
            CadastrarFotos($foto,$_POST['id_produto']);
        }else{
            Alert('não foi possivel cadastrar a foto');
        }
    }
  }

echo'
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-sm-12 offset-md-3 offset-sm-0">
            <table class="table table-striped table tablel-hover table table-bordered table table-sm">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Foto</th>
                        <th scope="col">#</th>
                    <tr>
                </thead>
                <tbody>
'; 
$fotos=ListarFotos($_GET['foto']);
      while($f=$fotos->fetch_array()){
      echo'<tr>              
      <th scope="row">'.$f['cd_foto'].'</th>
        <td>'.$f['nm_foto'].'</td>
      <td><img src="../'.$f['nm_foto'].'" height="50px"></td>
        <td>
      <a href="?foto='.$_GET['foto'].'&excluir='.($f['cd_foto']).'">Excluir</a>
        </td>
      <tr>';
}
?>