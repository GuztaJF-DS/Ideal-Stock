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

    //fotos

    function CadastrarFotos($nm_foto,$id_produto){
    $sql='INSERT INTO tb_foto VALUES(null,"'.$nm_foto.'",'.$id_produto.');';
    $res=$GLOBALS['conexao']->query($sql);
    if($res){
        alert("Capa cadastrada com sucesso");
    }
    else{
        alert("Erro Ao Cadastrar Capa: \r\n".$GLOBALS['$conexao']->error);
    }
}
function ListarFotos($id_produto){
    $sql='SELECT * FROM tb_foto WHERE id_produto = '.$id_produto.';';
    $res=$GLOBALS['conexao']->query($sql);
    return $res;
}
function ExcluirFoto($id_foto,$nm_foto){
    alert($nm_foto);
    $sql= 'DELETE FROM tb_foto WHERE cd_foto = '.$id_foto;
    $sql2= 'SELECT nm_foto FROM tb_foto WHERE cd_foto = '.$id_foto;
    $res = $GLOBALS['conexao']->query($sql); 
    $res2 = $GLOBALS['conexao']->query($sql2); 
    if($res){
        if($res2){
            if(file_exists('../'.$nm_foto) && is_file('../'.$nm_foto)){
            unlink('../'.$nm_foto);
            header('Refresh:0');
            }
        }else{
            alert("Foto não excluida dos arquivos");
        }
    }else{
        alert("Foto não excluida do banco:".$GLOBALS['conexao']->error);
    }
    
}

    //Produto

    function CadastrarProduto($nmProduto, $ds_produto, $marca, $valor, $dt_validade, $quantidade,$qt_entrada,$qt_saida,$dt_entrada,$dt_saida, $peso, $largura, $comprimento, $altura, $data_atualização,$categorias)
    {
        $sql = 'INSERT INTO tb_produto VALUES (null,"'.$nmProduto.'","'.$ds_produto.'","'.$marca.'",'.$valor.',"'.$dt_validade.'",'.$quantidade.','.$qt_entrada.',"'.$qt_saida.'","'.$dt_entrada.'","'.$dt_saida.'",'.$peso.','.$largura.','.$comprimento.','.$altura.',"'.$data_atualização.'")';
        $res = $GLOBALS['conexao']->query($sql);
        if($res)
        {
            $id = $GLOBALS['conexao']->insert_id;
            CadastrarProdutoCategoria($id,$categorias);
        }
        else
        {
            alert("Erro ao cadastrar produto!");
        }
    }

    function atualizarProduto($type,$id,$date,$qtd){
        if($type=="Enter"){            
            $sql="UPDATE `tb_produto` SET `qt_produto` = '".$qtd."',
            `entrada_produto` = '".$qtd."',
            `dt_entrada_produto` = '".$date."',
            `dt_atualizacao` = '".$date."' WHERE `cd_produto` =".$id.";";
        }
        else if($type=="Exit"){
            $sql="UPDATE `tb_produto` SET `qt_produto` = '".$qtd."',
            `saida_produto` = '".$qtd."',
            `dt_saida_produto` = '".$date."',
            `dt_atualizacao` = '".$date."' WHERE `cd_produto` =".$id.";";
        }
        $res=$GLOBALS['conexao']->query($sql);
        if($res){
            header('Refresh:0');
        }else{
            alert("Erro ao Atualizado Produto");
        }
    }

    function CadastrarProdutoCategoria($id_produto,$categorias){
        $total=sizeof($categorias);
        $sql='INSERT INTO tb_categoria_produto VALUES';
        for($i=0;$i<$total;$i++){
            $sql.='('.$categorias[$i].','.$id_produto.'),';
        }
        $sql=substr($sql,0,-1);
        $sql.=";";

        $res=$GLOBALS['conexao']->query($sql);
        if($res){
            alert("Produto Cadastrado com Sucesso");
        }else{
            alert("Erro ao cadastrar Produto nas categorias ");
        }
    }

    function ListaCategoriaProduto($cd_produto){
        $sql = 'SELECT t.nm_categoria from tb_categoria_produto cp  
        INNER JOIN tb_categoria t on(t.cd_categoria = cp.id_categoria)
        WHERE cp.id_produto='.$cd_produto.';';
        $res= $GLOBALS['conexao']->query($sql);
        if($res){
        foreach($res as $value){
            $a=implode($value);
            print_r($a);
            echo ' ';
        }
    }
    }

    function ListarProdutos($type,$id,$I1,$I2,$pesquisa)
    {
        
        if($type==null){
            $sql = 'SELECT * from tb_produto;';
        }
        else if($type=="Display"){
            $sql = 'SELECT * from tb_produto
            ORDER BY cd_produto DESC
            LIMIT 0,1;';
        }
        else if($type=="Products"){
            $sql = 'SELECT * from tb_produto
            ORDER BY cd_produto DESC
            LIMIT 1,12;';
        }
        else if($type=="Search"){
            $sql = 'SELECT * from tb_produto
            where nm_produto LIKE "%'.$pesquisa.'%"
            OR
            marca_produto LIKE "%'.$pesquisa.'%"
            ORDER BY nm_produto ASC
            LIMIT '.$I1.','.$I2.';';
        }
        else if($type=="Search2"){
            $sql = 'SELECT * from tb_produto
            ORDER BY nm_produto ASC
            LIMIT '.$I1.','.$I2.';';
        }
        else if($type=="Product"){
            $sql = 'SELECT * from tb_produto
            WHERE cd_produto='.$id.';';
        }
        else if($type=="Total"){
            $sql = 'SELECT COUNT(cd_produto) from tb_produto;';
        }
        else if($type=="Total2"){
            $sql = 'SELECT COUNT(cd_produto) from tb_produto
            where nm_produto LIKE "%'.$pesquisa.'%"
            OR
            marca_produto LIKE "%'.$pesquisa.'%";';
        }
        $res = $GLOBALS['conexao']->query($sql);
        return $res;
    }


    function DeletarProduto($id,$nmFoto)
    {
        $sql = 'DELETE FROM tb_categoria_produto WHERE id_produto = '.$id;
        $sql = 'DELETE FROM tb_produto WHERE cd_produto = '.$id;
        $res = $GLOBALS['conexao']->query($sql);
       
        if($res){
            if($nmFoto!=""){
                ExcluirFoto($id,$nmFoto);
            }
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