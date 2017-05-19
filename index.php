<?php

function __autoload($class_name){
	require_once "classes/" . $class_name . ".php";
}

$usuario = new Usuarios();

if(isset($_POST["cadastrar"])){
	$nome = $_POST["nome"];
	$idade = $_POST["idade"];
	$sexo = $_POST["sexo"];

	$usuario->setNome($nome);
	$usuario->setIdade($idade);
	$usuario->setSexo($sexo);
	
	# insert 
	if($usuario->insert()){
		echo "inserido com sucesso!";
	}
	

}


?>

<!DOCTYPE html>
<html lang="pt-br"></html>
<head>
	<title></title>
</head>
<body>
	
<form action="" method="post">
Nome <input type="text" name="nome">
Idade <input type="number" name="idade">
Sexo <input type="text" name="sexo">
<input type="submit" name="cadastrar" value="Cadastrar">


</form>

</body>
</html>



