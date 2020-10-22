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
  </head>
  <body style="background-color: #F0FDFF">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12 title_Bar"><a href="stock.php"><font color=white>Ideal Stock</font></a></div>
          <div class="col-10 Tool_Bar"><a href="Admin/categoria.php"><font color=white>Add Categoria</font></a>-<a href="Admin/produto.php"><font color=white>Add Produto</font></a></div>
        </div>
      <div class="row mt-4">
        <div class="col-10 offset-1 Menu_base mt-2">
          <h2 class="Line">Destaque</h2>
          <?php
          $Product=ListarProdutos();
          while ($p=$Product->fetch_array()) {
            $fotos=ListarFotos($p['cd_produto']);
            $f=$fotos->fetch_array();
            echo '<div class="Display"> 
                <a href="Produto.php"><img src="'.$f['nm_foto'].'" class="Responsive_image"></a>
                  <h3 class="font_Medium">'.$p['nm_produto'].'</h3>
                  <h4 class="font_Little">'.$p['vl_produto'].' R$</h4>
            </div>';
          }            
            ?>
            <div class="Itens_Base">
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene1.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene2.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene1.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene1.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene1.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene1.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene1.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene1.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produtophpl"><img src="Image/mene1.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene1.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene1.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene1.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
            </div>
        </div>
      </div>  
      <div class="row mt-5 ">
        <div class="col-10 offset-1 Menu_base mt-5">
          <h2 h2 class="Line">Pesquisa</h2>
          <input type="text" name="Search" class="Search_Input"><input type="button" name="Search_Button" value="✓" class="Search_Button">
            <div class="Itens_Base_Search">
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene2.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene2.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene2.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene2.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene2.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene2.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene2.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene2.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene2.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene2.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene2.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
              <div class="Item_Pic"> 
               <a href="Produto.php"><img src="Image/mene2.png"  class="Responsive_pic"></a>
                <a href="Produto.php"><h2 class="Text"><span>One Hot Minute</span></h2></a>
              </div>
        </div>
      </div>
      </div>
      <div class="row">
        <div class="col-12 Footer">Propriety of Jf Enterprizes</div>
      </div>
    </div>
  </body>
</html>