<?php
$conectar = mysql_connect('localhost','root','');
$banco    = mysql_select_db("loja");

if (isset($_POST['gravar']))
{
    $codigo            = $_POST['codigo'];
    $descricao         = $_POST['descricao'];
    $codcategoria      = $_POST['codcategoria'];
    $codtipo           = $_POST['codtipo'];
    $codmarca          = $_POST['codmarca'];
    $cor               = $_POST['cor'];
    $tamanho           = $_POST['tamanho'];
    $preco             = $_POST['preco'];
    $foto1             = $_FILES['foto1'];
    $foto2             = $_FILES['foto2'];


    $diretorio = "fotos/";

    $extensao1 = strtolower(substr($_FILES['foto1']['name'], -4));
    $novo_nome1 = md5(time().$extensao1);
    move_uploaded_file($_FILES['foto1']['tmp_name'], $diretorio.$novo_nome1);

    $extensao2 = strtolower(substr($_FILES['foto2']['name'], -6));
    $novo_nome2 = md5(time().$extensao2);
    move_uploaded_file($_FILES['foto2']['tmp_name'], $diretorio.$novo_nome2);

   $sql = mysql_query("INSERT INTO produto (codigo,descricao,codcategoria,codtipo,codmarca, cor,tamanho,preco,foto1,foto2)
                values ('$codigo','$descricao','$codcategoria','$codtipo','$codmarca','$cor','$tamanho','$preco','$novo_nome1','$novo_nome2')");

   $resultado = mysql_query($sql);

   if ($resultado)
        {echo " Falha no cadastro!";}
   else
        {echo " Dados cadastrados com sucesso!";}
}

if (isset($_POST['excluir']))
{
   $codigo            = $_POST['codigo'];
   $descricao         = $_POST['descricao'];
   $codcategoria      = $_POST['codcategoria'];
   $codtipo           = $_POST['codtipo'];
   $codmarca          = $_POST['codmarca'];
   $cor               = $_POST['cor'];
   $tamanho           = $_POST['tamanho'];
   $preco             = $_POST['preco'];
   $foto1             = $_FILES['foto1'];
   $foto2             = $_FILES['foto2'];

  $sql = "DELETE FROM produto WHERE codigo = '$codigo'";

  $resultado = mysql_query($sql);

  if ($resultado === TRUE)
  {
     echo 'Exclusao realizada com Sucesso';
  }
  else
  {
     echo 'Erro ao excluir dados.';
  }
}

if (isset($_POST['alterar']))
{
   $codigo            = $_POST['codigo'];
   $descricao         = $_POST['descricao'];
   $codcategoria      = $_POST['codcategoria'];
   $codtipo           = $_POST['codtipo'];
   $codmarca          = $_POST['codmarca'];
   $cor               = $_POST['cor'];
   $tamanho           = $_POST['tamanho'];
   $preco             = $_POST['preco'];
   $foto1             = $_FILES['foto1'];
   $foto2             = $_FILES['foto2'];

  $sql = "UPDATE produto SET descricao='$descricao', codtipo='$codtipo',preco='$preco'
          WHERE codigo = '$codigo'";
  $resultado = mysql_query($sql);

  if ($resultado === TRUE)
  {
     echo 'Dados alterados com Sucesso';
  }
  else
  {
     echo 'Erro ao alterar dados.';
  }
}

if (isset($_POST['pesquisar']))
{
   $sql = mysql_query("SELECT codigo,descricao,codcategoria,codtipo,codmarca,cor,tamanho,preco,foto1,foto2 FROM produto");
   
   if (mysql_num_rows($sql) == 0)
         {echo "Desculpe, mas sua pesquisa não retornou resultados.";}
   else
   {
        echo "<b>Produtos Cadastrados:</b><br><br>";
        while ($dados = mysql_fetch_object($sql))
        {
                    echo "Codigo         : ".$dados->codigo."<br>";
                    echo "Descricao      : ".$dados->descricao."<br>";
                    echo "Categoria      : ".$dados->codcategoria. "<br>";
                    echo "Tipo           : ".$dados->codtipo. "<br>";
                    echo "Marca          : ".$dados->codmarca. "<br>";  
                    echo "Cor            : ".$dados->cor. "<br>";
                    echo "Tamanho        : ".$dados->tamanho. "<br>";
                    echo "Preco          : ".$dados->preco. "<br>";
                    echo '<img src="fotos/'.$dados->foto1.'"height="200" width="200" />'. "<br>";
                    echo '<img src="fotos/'.$dados->foto2.'"height="200" width="200" />'. "<br>";
                    echo "<hr>";
      }
   }
}


?>
