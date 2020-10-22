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
            <div class="Display"> 
                <img src="Image/mene.png" class="Responsive_image">
                  <h3 class="font_Medium"></h3>
            </div>
                <div class="Product">
                    <div class="Product_Info"><br>
                      <strong>Produto:</strong> One Hot Minute<br>
                      <strong>Preço:</strong> 00.00 R$<br>
                      <strong>Quantidade diponivel:</strong>00<br>
                      <strong>Marca:</strong> Rede Hote<br>
                      <strong>Data de Entrada:</strong> 12/09/1995<br>
                      <strong>Descrição:</strong>Um album de Rock 
                    </div>
                    <div class="Product_Buy"><br>
                      <strong>Quantidade: </strong><input type="number" class="qtn" name="qtn"><br> 
                      <strong>Custo Total :</strong> 00.00 R$<br> 
                      <input type="Button" class="mt-2 mb-2 Buy" name="Aderir" value="Aderir">
                    </div>
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