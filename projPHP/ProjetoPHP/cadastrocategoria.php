
<?php

$conectar = mysql_connect('localhost','root','');
$banco = mysql_select_db('loja');

if (isset($_POST['gravar'])){

    //RECEBER VAR DO HTML
    $codigo= $_POST['codigo'];
    $nome = $_POST['nome'];
    $sql = "insert into categoria (codigo,nome) values ('$codigo','$nome')";

    $resultado = mysql_query($sql);

    if ($resultado == TRUE){
        echo "Dados gravados com sucesso!";
    }
    else {
        echo "Erro!";
    }
}

//ALTERAR NO BANCO
if(isset($_POST['alterar'])){

    //RECEBER VAR DO HTML
    $codigo= $_POST['codigo'];
    $nome = $_POST['nome'];

    $sql = "update categoria set nome = '$nome' where codigo = '$codigo'";

    $resultado = mysql_query($sql);

    if ($resultado == TRUE){
        echo "Dados alterados com sucesso!";
    }
    else {
        echo "Erro!";
    }
}

//EXCLUIR NO BANCO
if(isset($_POST['excluir'])){

    //RECEBER VAR DO HTML
    $codigo= $_POST['codigo'];
    $nome = $_POST['nome'];

    $sql = "delete from categoria where codigo = '$codigo'";

    $resultado = mysql_query($sql);

    if ($resultado == TRUE){
        echo "Dados excluidos com sucesso!";
    }
    else {
        echo "Erro!";
    }
}


if(isset($_POST['pesquisar'])){

    //RECEBER VAR DO HTML
    $codigo= $_POST['codigo'];
    $nome = $_POST['nome'];

    $sql = "select * from categoria";

    $resultado = mysql_query($sql);

    if (mysql_num_rows($resultado) == 0){
        echo "Dados nao encontrados!";
    }
    else {
        echo "<b>"."Resultado da pesquisa por categoria:  ". "</b><br>";
        while($dados = mysql_fetch_array($resultado)){
            echo "Codigo  :  ".$dados['codigo']."<br>".
                 "Nome    :  ".$dados['nome']."<br><br>";
                 
        }
    }
}


?>