<?php

//variaveis de configuração da conexão com o banco de dados do Ideal Stock
    $serv = "localhost";
    $user = "root";
    $senha = "usbw";
    $banco = "db_estoque";

    $conecxao = new mysql($serv,$user,$senha,$banco);

    if(!$conexao){
        echo"erro ao conectar com o banco".$conexao->error;
    }


    //------------------funções utilizadas no site---------------------

    //Categoria 

    function CadastrarCategoria($nome_categoria, $descricao_categoria)
    {
        $sql = 'INSERT INTO tb_categoria VALUE (null,"'.$nome_categoria.'","'.$descricao_categoria.'");';
        $res = $GLOBALS['conexao']->query($sql);

        if($res)
        {
            alert("Categoria cadastrado com sucesso!");
        }
        else
        {
            alert("Erro ao cadastrar categoria: \r\n".$GLOBALS['$conexao']->error);
        }
    }

    function ListarCategorias()
    {
        $sql = 'SELECT * FROM tb_categoria;';
        $res = $GLOBALS['conexao']->query($sql);
        return $res;
    }

    function DeletarCategoria($id_categoria)
    {
        $sql1 =  'DELETE FROM tb_categoria_produto Where id_categoria ='.$id_categoria';';
        $res1 = $GLOBALS['conexao']->query($sql1);
        $sql2 = 'DELETE FROM tb_categoria  Where cd_categoria = '.$id_categoria'";';
        $res2 = $GLOBALS['conexao']->query($sql2);

        if($res1)
        {
            alert("Relações feitas a essa categoria foram excluidas!");
        }
        else
        {
            alert("Erro ao deletar as relações ligadas a essa categoria!\r\n".$GLOBALS['$conexao']->error);
        }

        if($res1)
        {
            alert("Categoria excluida!");
        }
        else
        {
            alert("Erro ao deletar a categoria!\r\n".$GLOBALS['$conexao']->error);
        }
    }

    //Produto

    function CadastrarProduto($nmProduto, $ds_produto, $marca, $valor, $dt_validade, $quantidade, $peso, $largura, $comprimento, $altura, $data_atualização,$id_categoria)
    {
        $sql = 'INSERT INTO tb_produto Value (null,"'.$nmProduto.'","'.$ds_produto.'","'.$marca.'",'.$valor.','.$dt_validade.','.$quantidade.',"","","","",'.$peso.','.$largura.','.$comprimento.','.$altura.',"'.$data_atualização.'",);';
        $res = $GLOBALS['conexao']->query($sql);

        if($res)
        {
            alert("Produto cadastrado com sucesso");
        }
        else
        {
            alert("Erro ao cadastrar produto");
        }
    }

    function ListarProduto()
    {

    }

    function ListarProdutoComFiltro()
    {

    }

    function DeletarProduto()
    {

    }



    //usuario 

    //estoque

    //utilitarias

    function alert($msg){
        echo'<script>
            alert("'.$msg.'");
        </script>';
    }
?>