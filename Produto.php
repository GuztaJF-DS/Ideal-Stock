<?php include('./Admin/conexao.php');?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Ideal Stock</title>
  <script src="Js/jquery-3.3.1.min.js"></script>
  <script src="Js/script.js"></script>
    <script src="Js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="Css/style.css">
  <link rel="stylesheet" href="Css/bootstrap.min.css">

</head>
<body style="background-color:#F0FDFF;">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12 title_Bar"><a href="stock.php"><font color=white>Ideal Stock</font></a></div>
          <div class="col-10 Tool_Bar"><a href="Admin/categoria.php"><font color=white>Add Categoria</font></a>-<a href="Admin/produto.php"><font color=white>Add Produto</font></a></div>
        </div>
      <div class="row mt-4">
        <div class="col-10 offset-1 Menu_base mt-2">
          <h2 class="Line">Produto</h2>
            <?php
              $Product=ListarProdutos("Product",$_GET['id'],null,null);
              while ($p=$Product->fetch_array()) {
                $fotos=ListarFotos($p['cd_produto']);
                $f=$fotos->fetch_array();
                echo '<div class="Display"> 
                      <img src="'.$f['nm_foto'].'" class="Responsive_image">
                      <h3 class="font_Medium"></h3>
                </div>';
              }    
            ?>
                <div class="Product">
                  <?php
                    $Product=ListarProdutos("Product",$_GET['id'],null,null);
                    while($p=$Product->fetch_array()){
                      echo '<div class="Product_Info"><br>
                      <strong>Produto:</strong>'.$p['nm_produto'].'<br>
                      <strong>Preço:</strong> '.$p['vl_produto'].' R$<br>
                      <strong>Quantidade diponivel:</strong>'.$p['qt_produto'].'<br>
                      <strong>Marca:</strong> '.$p['marca_produto'].'<br>
                      <strong>Data de Entrada:</strong> '.$p['entrada_produto'].'<br>
                      <strong>Descrição:</strong>'.$p['ds_produto'].'</div>
                      <div class="Product_Buy"><br>
                        <strong>Quantidade: </strong><input type="number" class="qtn" name="qtn" min="0" max="'.$p['qt_produto'].'"><br> 
                        <strong>Custo Total :</strong> 00.00 R$<br> 
                        <input type="Button" class="mt-2 mb-2 Buy" name="Aderir" value="Aderir">
                      </div>';
                      }

                    ?>
                </div>
          </div>
          </div>  
        <div class="row">
        <div class="col-12 Footer">
          Propriety of Jf Enterprizes
        </div>
      </div>
    </div>
</body>
</html>