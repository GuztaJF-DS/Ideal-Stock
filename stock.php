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

<style>
#myFooter{
    padding-top:32px;
}

#myFooter .container{
    text-align: center;
    font-weight: bold;
    text-transform: capitalize;
    font-family: 'Open Sans';
    text-shadow: 0px 0px 1px rgb(35, 137, 221);
}

#myFooter .footer-copyright{
    margin-bottom: 35px;
    text-align: center;
   color:rgb(20, 20, 22);
}

#myFooter ul{
    list-style-type: none;
    padding: 0;
    margin-bottom: 18px;
}

#myFooter a{
    color: #282b2d;
    font-size: 18px;
}

#myFooter li{
    display: inline-block;
    margin: 0px 15px;
    line-height: 2;
}

#myFooter .footer-social{
    text-align: center;
    padding-top: 25px;
    padding-bottom: 25px;
    background-color:rgb(183, 236, 236);
    border-radius:20px;
}

#myFooter .fa{
    font-size: 36px;
    margin-right: 15px;
    margin-left: 20px;
    background-color: white;
    color: #d0d0d0;
    border-radius: 51%;
    padding: 10px;
    height: 60px;
    width: 60px;
    text-align: center;
    line-height: 43px;
    text-decoration: none;
    transition:color 0.2s;
}

#myFooter .fal{
  color:yellow;
}
#myFooter .fa-facebook:hover{
   color: #2b55ff;
}

#myFooter .fa-facebook:focus{
    color: #2b55ff; 
}

#myFooter .fa-instagram:hover{
    color:purple;
}

#myFooter .fa-instagram:focus{
    color:purple;
}

#myFooter .fa-youtube:hover{
    color:red;
}

#myFooter .fa-youtube:focus{
    color:red;
}

#myFooter .fa-twitter:hover{
    color: #00aced;

}

#myFooter .fa-twitter:focus{
    color:#00aced;
}

#myFooter .fa-envelope:hover{
    color: red;

}

#myFooter .fa-envelope:focus{
    color:red;
}


</style>

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
          $Product=ListarProdutos("Display",null,null,null);
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
              $Product=ListarProdutos("Products",null,null,null);
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
          <input type="text" name="Search" class="Search_Input"><input type="button" name="Search_Button" value="✓" class="Search_Button">
            <div class="Itens_Base_Search">
              <?php
              $Page=(isset($_GET['Page'])) ? ($_GET['Page']) :1;
              $NItens=12;
              $Page=($NItens*$Page)-$NItens;
              $Product=ListarProdutos("Search",null,$Page,$NItens);
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

      <div class="col-10 offset-1 Page mt-2">
      <?php
        $P=ListarProdutos("Total",null,$Page,$NItens);
        $t=$P->fetch_array();
        $total=$t['COUNT(cd_produto)'];  
        $buttons=ceil($total/$NItens);
        for($i=1;$i<=$buttons;$i++){
          echo'<a href ="?Search=0&Page='.$i.'"><input type="button" class="PageButtons" value='.$i.'></a>';
        }
      ?>
      </div>
      <div class="row">
      <div class="col-12"
      <div class="Itens_Base">
        <footer id="myFooter">
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
        </div>
        </footer>
      </div>
      </div>
      </div>
      </div>
    </div>
  </body>
</html>