<?php include('./Admin/conexao.php');
session_start();
?>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

</head>
<body style="background-color:#F0FDFF;">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12 title_Bar"><a href="stock.php"><font color=white>Ideal Stock</font></a></div>
          <div class="col-10 Tool_Bar"><a href="Admin/categoria.php"><font color=white>Add Categoria</font></a>-<a href="Admin/produto.php"><font color=white>Add Produto</font></a>-<a href="./relatorio.php"><font color=white>Visualizar Relatório</font></a></div>
        </div>

      <div class="row mt-4">
        <div class="col-10 offset-1 Menu_base mt-2">
          <h2 class="Line">Produto</h2>
            <?php
              $Product=ListarProdutos("Product",$_GET['id'],null,null,null);
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
                    $Product=ListarProdutos("Product",$_GET['id'],null,null,null);
                    while($p=$Product->fetch_array()){
                      echo '<div class="Product_Info"><br>
                      <input type="hidden" id="id" valor="'.$p['cd_produto'].'">
                      <strong>Produto:</strong><a id="pro" valor="'.$p['vl_produto'].'">'.$p['nm_produto'].'</a><br>
                      <strong>Preço:</strong> '.$p['vl_produto'].' R$<br>
                      <strong>Quantidade diponivel:</strong>'.$p['qt_produto'].'<br>
                      <strong>Marca:</strong> '.$p['marca_produto'].'<br>';
                      if($p['dt_entrada_produto']!='0000-00-00'){                        
                        echo '<strong>Data de Entrada:</strong> '.$p['dt_entrada_produto'].'<br>';
                      }
                      if($p['dt_saida_produto']!='0000-00-00'){ 
                      echo '<strong>Data de Saida:</strong> '.$p['dt_saida_produto'].'<br>';
                      }
                      echo'<strong>Data de Atualização:</strong> '.$p['dt_atualizacao'].'<br>                      
                      <strong>Descrição:</strong>'.$p['ds_produto'].'</div>
                      <div class="Product_Buy"><br>
                        <strong>Quantidade: </strong><input type="number" class="qtn" name="qtn" min="0" max="99999999" value="';

                        if(isset($_COOKIE['quant'][$p['cd_produto']])){
                           echo $_COOKIE['quant'][$p['cd_produto']]; 
                        }else{
                           echo $p['qt_produto'];
                        }
                      
                        echo '"><br> 
                        <strong>Custo Total :</strong><span id="total">';

                        if(isset($_COOKIE['total'][$p['cd_produto']])){
                           echo $_COOKIE['total'][$p['cd_produto']].' R$'; 
                        }else{
                          $a = $p['vl_produto']*$p['qt_produto'];
                          echo $a." R$";
                        }
                        echo '</span><br> 
                        <form action="Produto.php?id='.$p['cd_produto'].'" method="POST">
                        <input type="hidden" name="qtd" value="'.$p['qt_produto'].'">
                        <input type="submit" class="mt-2 mb-2 Buy" name="Atualizar" value="Atualizar" >
                        </form>
                      </div>';
                      }

                    ?>
                </div>
          </div>
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
<?php
if($_POST){
  $id=$_GET['id'];
  $QtdOld=$_POST['qtd'];
  $QtdNew=$_COOKIE['quant'][$id];
  date_default_timezone_set('America/Sao_Paulo');
  $agora = new DateTime();
  $NewDate = $agora->format('Y-m-d');

  if($QtdNew>$QtdOld){//att entrada
    atualizarProduto("Enter",$id,$NewDate,$QtdNew);
  }
  else if($QtdNew<$QtdOld){//att saida
    atualizarProduto("Exit",$id,$NewDate,$QtdNew);
  }
  else{
    return;
  }
}
?>
<script> 
  $(document).on('change','.qtn',function(){
     var z=$('#pro').attr('valor');
     var y=$(this).val();
     var x=y*z;
     var id=$('#id').attr('valor');
     $('#total').html(x+' R$');
     var d = new Date();
     d.setTime(d.getTime() + (30*24*60*60*1000));
     var expires = "expires="+ d.toUTCString();
     document.cookie = "total["+id+"]="+x+";"+expires+ ";";
     document.cookie = "quant["+id+"]="+y+";"+expires+ ";";     
   });
</script>  