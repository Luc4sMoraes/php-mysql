<!DOCTYPE html>
<html>
<head>
	<title>Inserir Dados</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css"/>
    <script type="text/javascript" src="_script/Validar.js"></script>
    <!-- Bootstrap -->
   <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
</head>
<body>
<div id="menu">
<div class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-default" "><a href="select.php">Select</a></button>
  <button type="button" class="btn btn-default"><a href="update.php">Update</a></button>
  <button type="button" class="btn btn-default"><a href="delete.php">Delete</a></button>
</div>
</div>
<script type="text/javascript">
	var Test = new Validar();

	
</script>

<?php
function __autoload($class_name){
	require_once "class/" . $class_name . ".php";
}

$pdo = new Config();

// Prepara o cadastro

$valores = new Post();

$nome = $valores->addPost("nome");
$idade = $valores->addPost("idade");
$sexo = $valores->addPost("sexo");

$idade = date("y-m-d",strtotime($idade));

// Prepara a inserção de dados
$a = $pdo->PDO()->prepare("INSERT INTO usuario(nome,idade,sexo) VALUES (:nome,:idade,:sexo)");
$a->bindValue(":nome",$nome);
$a->bindValue(":idade",$idade);
$a->bindValue(":sexo",$sexo);


?>

<form method="POST" name="formulario">
	<fieldset>
	<legend>Inserir Dados</legend>
	<div class="input-group">
	<span class="input-group-addon" id="basic-addon1">Nome</span>
	<input type="text" name="nome" placeholder="Nome" class="form-control" aria-describedby="basic-addon1">	
	<span class="input-group-addon" id="basic-addon1">Nascimento</span>
	<input type="date" name="idade" placeholder="Idade" class="form-control" aria-describedby="basic-addon1">
	
	<span class="input-group-addon" id="basic-addon1"  label="sexo">Sexo</span>
	<select class="form-control" name="sexo">
	<option checked value="M">Masculino</option>
	<option value="F">Feminino</option>		
	</select>
	</div>

	<button type="submit" class="btn btn-default navbar-btn" onclick="return Test.ValidInsert(nome,idade,sexo);">Enviar</button>
	</fieldset>

	<?php
	// Valida o cadastro
if(!empty($nome) && !empty($idade) && !empty($sexo)):
$b = $pdo->PDO()->prepare("SELECT * FROM usuario Where nome=?");
$b->execute(array($nome));
if($b->rowCount() == 0):
	// Executa o cadastro caso não exista nome igual ao mencionado
	
	$a->execute();
	if($a->rowCount() > 0):
		echo "<h4>Usuário cadastrado com sucesso!</h4>";
	else:
		echo "<h4>O usuario não foi cadastrado!</h4>";
	endif;
else:
	echo "<h4>Ooops, o usuário já consta em nossa base de dados!</h4>";
	endif;

endif;

	?>
</form>
</body>
</html>