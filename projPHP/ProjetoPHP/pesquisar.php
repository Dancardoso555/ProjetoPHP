<?php
$connect = mysql_connect('localhost','root','');
$db      = mysql_select_db('loja');
?>

<HTML>
<HEAD>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <TITLE> Pagina Principal</TITLE>
 
 <link rel="stylesheet" href="pesq.css">
</HEAD>
<body>

<a href="cadastrousuario.html"><img src="login.png" width=50 height=50 align="right"></a>

<h1 align="center">D-PRODS</h1><br>
<div class="img"><img src="logo.png" width=300 height=170 align="center">
</div>
<br><br><br><br><br>

<div class=fundo>
    <form name="formulario" method="post" action="pesquisar.php">
       <br><br>
       <br><br><br><br><br>
       <h1>Pesquisas:</h1>
       
        <label for="">Categorias: </label>
        <select name="categoria">
        <option value="" selected="selected">Selecione...</option>

        <?php
        $query = mysql_query("SELECT codigo, nome FROM categoria");
        while($categoria = mysql_fetch_array($query))
        {?>
        <option value="<?php echo $categoria['codigo']?>">
                       <?php echo $categoria['nome']   ?></option>
        <?php }
        ?>
        </select>
        
        <label for="">Tipo: </label>
        <select name="tipo">
        <option value="" selected="selected">Selecione...</option>

        <?php
        $query = mysql_query("SELECT codigo, nome FROM tipo");
        while($tipo= mysql_fetch_array($query))
        {?>
        <option value="<?php echo $tipo['codigo']?>">
                       <?php echo $tipo['nome']   ?></option>
        <?php }
        ?>
        </select>
        
       <label for="">Marcas: </label>
        <select name="marca">
        <option value="" selected="selected">Selecione...</option>

        <?php
        $query = mysql_query("SELECT codigo, nome FROM marca");
        while($marcas = mysql_fetch_array($query))
        {?>
        <option value="<?php echo $marcas['codigo']?>">
                       <?php echo $marcas['nome']   ?></option>
        <?php }
        ?>
        </select>
        <br><br><br>     
        <input  type="submit" name="pesquisar" value="Pesquisar">
    </form>
<br><br>
<?php

if (isset($_POST['pesquisar']))
{
$marca          = (empty($_POST['marca']))? 'null' : $_POST['marca'];
$categoria      = (empty($_POST['categoria']))? 'null' : $_POST['categoria'];
$tipo = (empty($_POST['tipo']))? 'null' : $_POST['tipo'];

//Marca
if (($marca <> 'null') and ($categoria == 'null') and ($tipo == 'null'))
{
     $sql_produtos       = "SELECT produto.descricao,produto.cor,produto.tamanho,produto.preco,produto.foto1,produto.foto2
                            FROM produto, marca, categoria, tipo
                            WHERE produto.codmarca = marca.codigo
                            and produto.codcategoria = categoria.codigo
                            and produto.codtipo= tipo.codigo
                            and marca.codigo = $marca ";
                            
     $seleciona_produtos = mysql_query($sql_produtos);
}

//Categoria
if (($marca == 'null') and ($categoria <> 'null') and ($tipo == 'null'))
{
     $sql_produtos       = "SELECT produto.descricao,produto.cor,produto.tamanho,produto.preco,produto.foto1,produto.foto2
                            FROM produto, marca, categoria, tipo
                            WHERE produto.codmarca = marca.codigo
                            and produto.codcategoria = categoria.codigo
                            and produto.codtipo= tipo.codigo
                            and categoria.codigo = $categoria ";
                            
     $seleciona_produtos = mysql_query($sql_produtos);
}

//Tipo
if (($marca == 'null') and ($categoria == 'null') and ($tipo <> 'null'))
{
     $sql_produtos       = "SELECT produto.descricao,produto.cor,produto.tamanho,produto.preco,produto.foto1,produto.foto2
                            FROM produto, marca, categoria, tipo
                            WHERE produto.codmarca = marca.codigo
                            and produto.codcategoria = categoria.codigo
                            and produto.codtipo= tipo.codigo
                            and tipo.codigo = $tipo ";
                            
     $seleciona_produtos = mysql_query($sql_produtos);
}

// Marca e Categoria
if (($marca <> 'null') and ($categoria <> 'null') and ($tipo == 'null'))
{
     $sql_produtos       = "SELECT produto.descricao,produto.cor,produto.tamanho,produto.preco,produto.foto1,produto.foto2
                            FROM produto, marca, categoria, tipo
                            WHERE produto.codmarca = marca.codigo
                            and produto.codcategoria = categoria.codigo
                            and produto.codtipo= tipo.codigo
                            and marca.codigo= $marca 
                            and categoria.codigo = $categoria";

                            
     $seleciona_produtos = mysql_query($sql_produtos);
}


//Marca e Tipo
if (($marca <> 'null') and ($categoria == 'null') and ($tipo <> 'null'))
{
     $sql_produtos       = "SELECT produto.descricao,produto.cor,produto.tamanho,produto.preco,produto.foto1,produto.foto2
                            FROM produto, marca, categoria, tipo
                            WHERE produto.codmarca = marca.codigo
                            and produto.codcategoria = categoria.codigo
                            and produto.codtipo= tipo.codigo
                            and marca.codigo= $marca 
                            and tipo.codigo = $tipo";

                            
     $seleciona_produtos = mysql_query($sql_produtos);
}

//Categoria e Tipo
if (($marca == 'null') and ($categoria <> 'null') and ($tipo <> 'null'))
{
     $sql_produtos       = "SELECT produto.descricao,produto.cor,produto.tamanho,produto.preco,produto.foto1,produto.foto2
                            FROM produto, marca, categoria, tipo
                            WHERE produto.codmarca = marca.codigo
                            and produto.codcategoria = categoria.codigo
                            and produto.codtipo= tipo.codigo
                            and categoria.codigo= $categoria 
                            and tipo.codigo = $tipo";

                            
     $seleciona_produtos = mysql_query($sql_produtos);
}
//Marca, Tipo e Categoria
if (($marca <> 'null') and ($categoria <> 'null') and ($tipo <> 'null'))
{
     $sql_produtos       = "SELECT produto.descricao,produto.cor,produto.tamanho,produto.preco,produto.foto1,produto.foto2
                            FROM produto, marca, categoria, tipo
                            WHERE produto.codmarca = marca.codigo
                            and produto.codcategoria = categoria.codigo
                            and produto.codtipo= tipo.codigo
                            and marca.codigo= $marca 
                            and categoria.codigo = $categoria 
                            and tipo.codigo = $tipo";                           
     $seleciona_produtos = mysql_query($sql_produtos);
}



if(mysql_num_rows($seleciona_produtos) == 0)
{
   echo '<h1>Desculpe, mas sua busca nao retornou resultados ... </h1>';
}
else
{
   echo "Resultado da pesquisa de Produtos: <br><br>";
   while ($dados = mysql_fetch_object($seleciona_produtos))
	{
      echo "Descrição :    ".$dados->descricao." ";
      echo "  Cor       : ".$dados->cor." ";
      echo "  Tamanho   : ".$dados->tamanho." ";
      echo "  Preço R$  : ".$dados->preco."<br>";
      echo '<img src="fotos/'.$dados->foto1.'" height="200" width="250" />'." ";
      echo '<img src="fotos/'.$dados->foto2.'" height="200" width="250" />'."<br><br>";
	}
   }
}
?>
</body>
</div>
</HTML>
