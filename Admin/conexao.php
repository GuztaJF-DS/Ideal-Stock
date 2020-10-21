<?php

//variaveis de configuração da conexão com o banco de dados do Ideal Stock
    $serv = "localhost";
    $user = "root";
    $senha = "usbw";
    $banco = "db_estoque";

    $conexao = new mysqli($serv,$user,$senha,$banco);
    $conexao->query("SET NAMES 'utf8'");
    $conexao->query('SET character_set_connection=utf8');  
    $conexao->query('SET character_set_client=utf8');
    $conexao->query('SET character_set_results=utf8');

    if(!$conexao){
        echo"Erro ao conectar com o banco".$conexao->error;
    }


    //------------------funções utilizadas no site---------------------
    //Categoria 

    function CadastrarCategoria($nome_categoria, $descricao_categoria)
    {
        $sql = 'INSERT INTO tb_categoria VALUES (null,"'.$nome_categoria.'","'.$descricao_categoria.'")';
        $res = $GLOBALS['conexao']->query($sql);

        if($res)
        {
            alert("Categoria cadastrada com sucesso!");
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
        $sql2 = 'DELETE FROM tb_categoria  Where cd_categoria = '.$id_categoria;
        $res2 = $GLOBALS['conexao']->query($sql2);

        if($res2)
        {
            alert("Categoria excluida!");
        }
        else
        {
            alert("Erro ao deletar a categoria!\r\n".$GLOBALS['$conexao']->error);
        }
    }

    //Produto

    function CadastrarProduto($nmProduto, $ds_produto, $marca, $valor, $dt_validade, $quantidade,$qt_entrada,$qt_saida,$dt_entrada,$dt_saida, $peso, $largura, $comprimento, $altura, $data_atualização,$categorias)
    {
        $sql = 'INSERT INTO tb_produto VALUES (null,"'.$nmProduto.'","'.$ds_produto.'","'.$marca.'",'.$valor.','.$dt_validade.','.$quantidade.','.$qt_entrada.','.$qt_saida.','.$dt_entrada.','.$dt_saida.','.$peso.','.$largura.','.$comprimento.','.$altura.',"'.$data_atualização.'")';
        $res = $GLOBALS['conexao']->query($sql);
        if($res)
        {
            $id = $GLOBALS['conexao']->insert_id;
            CadastrarProdutoCategoria($id,$categorias);
            alert("Produto cadastrado com sucesso");
        }
        else
        {
            alert("Erro ao cadastrar produto!" + $sql);
        }
    }

    function CadastrarProdutoCategoria($id_produto,$categorias){
        $total = sizeof($categorias);
        $sql = 'INSERT INTO tb_categoria_produto VALUES ';
        for($i = 0 ;$i<$total;$i++){
            $sql .= '('.$categorias[$i].','.$id_produto.'),';
        }
        //tirar -1 posicao
        $sql = substr($sql,0,-1);
        $sql .= ';';
        $res= $GLOBALS['conexao']->query($sql);
        if($res){
            alert("Produto cadastrado com sucesso");
        }else{
            alert("Erro ao cadastrar produto nas categorias");
        }
    }

    function ListaCategoriaProduto(){
        $sql = 'SELECT * from tb_produto pro INNER JOIN tb_categoria_produto cp on(pro.cd_produto = cp.id_produto)  INNER JOIN tb_categoria t 
        on(t.cd_categoria = cp.id_categoria)';
        $res= $GLOBALS['conexao']->query($sql);
        return $res;
    }

    function ListarProdutos()
    {
        $sql = 'SELECT * from tb_produto';
        $res = $GLOBALS['conexao']->query($sql);
        return $res;
    }

    function ListarProdutoComFiltro()
    {

    }

    function DeletarProduto($id)
    {
        $sql = 'DELETE FROM tb_categoria_produto WHERE id_produto = '.$id;
        $sql = 'DELETE FROM tb_produto WHERE cd_produto = '.$id;
        $res = $GLOBALS['conexao']->query($sql);
       
        if($res){
           alert("Produto excluido");
        }else{
            alert("Erro ao excluir produto da categoria ".$GLOBALS['conexao']->error);
        }
    }



    //usuario 

    function CadastrarUsuario($nm_user,$cd_nivel,$login_user,$senha_user,$email_user){
        $sql = 'INSERT INTO tb_user VALUES(null,"'.$nm_user.'",'.$cd_nivel.',"'.$login_user.'","'.$senha_user.'","'.$email_user.'")';
        $res = $GLOBALS['conexao']->query($sql);
        if($res){
            alert("Usuario Cadastrado com sucesso");
        }
        else{
            alert("Usuario não cadastrado");
        }
    }

    function ListarUsuario(){
        $sql = 'SELECT * FROM tb_user';
        $res = $GLOBALS['conexao']->query($sql);
        return $res;
    }

    //estoque

    //utilitarias

    function alert($msg){
        echo'<script>
            alert("'.$msg.'");
        </script>';
    }
?>