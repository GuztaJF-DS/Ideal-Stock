<?php include('./Admin/conexao.php');?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Ideal Stock</title>
    <script src="Js/jquery-3.3.1.min.js"></script>
    <script src="Js/script.js"></script>
    <link rel="stylesheet" href="Css/style.css" />
    <link rel="stylesheet" href="Css/bootstrap.min.css" />
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  </head>

  <body style="background-color: #F0FDFF">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12 title_Bar"><a href="stock.php"><font color=white>Ideal Stock</font></a></div>
          <div class="col-10 Tool_Bar"><a href="Admin/categoria.php"><font color=white>Add Categoria</font></a>-<a href="Admin/produto.php"><font color=white>Add Produto</font></a>-<a href="./relatorio.php"><font color=white>Visualizar Relatório</font></a></div>
        </div>
      <div class="row mt-4">
        <div class="col-10 offset-1 Menu_base mt-2">
          <h2 class="Line">Destaque</h2>
          <?php
          $Product=ListarProdutos("Display",null,null,null,null);
          while ($p=$Product->fetch_array()) {
            $fotos=ListarFotos($p['cd_produto']);
            $f=$fotos->fetch_array();
            echo '<div class="Display"> 
                <a href="Produto.php?id='.$p['cd_produto'].'"><img src="'.$f['nm_foto'].'" class="Responsive_image"></a>
                  <h3 class="font_Medium">'.$p['nm_produto'].'</h3>
                  <h4 class="font_Little">'.$p['vl_produto'].' R$</h4>
            </div>';
          }            
            ?>
            <div class="Itens_Base">
              <?php
              $Product=ListarProdutos("Products",null,null,null,null);
              while ($p=$Product->fetch_array()) {
                $fotos=ListarFotos($p['cd_produto']);
                $f=$fotos->fetch_array();
                echo'<div class="Item_Pic"> 
                      <a href="Produto.php?id='.$p['cd_produto'].'"><img src="'.$f['nm_foto'].'"  class="Responsive_pic"></a>
                      <a href="Produto.php?id='.$p['cd_produto'].'"><h2 class="Text"><span><strong>'.$p['nm_produto'].'</strong></span><br><span>'.$p['vl_produto'].' R$</span></h2></a>
                     </div>';
                }
              ?>
            </div>
        </div>
      </div>  
      <div class="row mt-5 ">
        <div class="col-10 offset-1 Menu_base mt-5">
          <h2 h2 class="Line">Pesquisa</h2>
          <form name="pesquisa" action="stock.php" method="GET">
          <input type="text" name="Search" class="Search_Input">
          <input type="hidden" name="Page" value="1">
          <button type="submit" class="Search_Button">✓</button>
          </form>
            <div class="Itens_Base_Search">
              <?php
              $Page=(isset($_GET['Page'])) ? ($_GET['Page']) :1;
              $NItens=12;
              $Page=($NItens*$Page)-$NItens;

                if(isset($_GET['Search']))
                {
                    $Product=ListarProdutos("Search",null,$Page,$NItens,$_GET['Search']);
                    while ($p=$Product->fetch_array()) {
                      $fotos=ListarFotos($p['cd_produto']);
                      $f=$fotos->fetch_array();
                      echo'<div class="Item_Pic"> 
                            <a href="Produto.php?id='.$p['cd_produto'].'"><img src="'.$f['nm_foto'].'"  class="Responsive_pic"></a>
                            <a href="Produto.php?id='.$p['cd_produto'].'"><h2 class="Text"><span><strong>'.$p['nm_produto'].'</strong></span><br><span>'.$p['vl_produto'].' R$</span></h2></a>
                          </div>';
                    }
                }
                else
                {
                  $Product=ListarProdutos("Search2",null,$Page,$NItens,null);
                    while ($p=$Product->fetch_array()) {
                      $fotos=ListarFotos($p['cd_produto']);
                      $f=$fotos->fetch_array();
                      echo'<div class="Item_Pic"> 
                            <a href="Produto.php?id='.$p['cd_produto'].'"><img src="'.$f['nm_foto'].'"  class="Responsive_pic"></a>
                            <a href="Produto.php?id='.$p['cd_produto'].'"><h2 class="Text"><span><strong>'.$p['nm_produto'].'</strong></span><br><span>'.$p['vl_produto'].' R$</span></h2></a>
                          </div>';
                    }
                }
              ?>
        </div>
      </div>
      </div>

      <div class="col-10 offset-1 Page mt-2">
      <?php
        if(isset($_GET['Search'])){
          $P=ListarProdutos("Total2",null,$Page,$NItens,$_GET['Search']);
          $t=$P->fetch_array();
          $total=$t['COUNT(cd_produto)'];  
          $buttons=ceil($total/$NItens);
          for($i=1;$i<=$buttons;$i++){
            echo'<a href ="?Search='.$_GET['Search'].'&Page='.$i.'"><input type="button" class="PageButtons" value='.$i.'></a>';
          }
        }else{
          $P=ListarProdutos("Total",null,$Page,$NItens,null);
          $t=$P->fetch_array();
          $total=$t['COUNT(cd_produto)'];  
          $buttons=ceil($total/$NItens);
          for($i=1;$i<=$buttons;$i++){
            echo'<a href ="?Page='.$i.'"><input type="button" class="PageButtons" value='.$i.'></a>';
          }
        }
        
      ?>
      </div>
      <div class="row">
      <div class="col-12">
        <footer class="myFooter">
        <div class="footer-social">
        <div class="container">
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="https://idealstock2020@gmail.com">Contato</a></li>
                <li><a href="./account.php">Criar Conta</a></li>
                <i class="fal fa-map-marker-smile"></i><li><a href="https://goo.gl/maps/f9SboLsksrN2dzbVA" class="social-icons">Localização</a></li>
              <p class="footer-copyright">© 2020 Copyright - IdealStock</p>
            <a href="https://www.facebook.com/ideal.stock79/" class="social-icons"><i class="fa fa-facebook"></i></a>
            <a href="https://www.instagram.com/idealstock2020/" class="social-icons"><i class="fa fa-instagram"></i></a>
            <a href="https://twitter.com/stock_ideal" class="social-icons"><i class="fa fa-twitter"></i></a>
            <a href="https://idealstock2020@gmail.com" class="social-icons"><i class="fa fa-envelope"></i></a>
            
        </div>
        </footer>
      </div>
      </div>
      </div>
      </div>
    </div>
  </body>
</html>