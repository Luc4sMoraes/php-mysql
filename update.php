<!DOCTYPE html>
<html>
<head><title>Atualizando Dados</title></head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css"/>
    <script type="text/javascript" src="_script/Validar.js"></script>
    <!-- Bootstrap -->
   <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
<body>
<div id="menu">
<div class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-default" "><a href="insert.php">Insert</a></button>
  <button type="button" class="btn btn-default"><a href="select.php">Select</a></button>
  <button type="button" class="btn btn-default"><a href="delete.php">Delete</a></button>
</div>
</div>
<script type="text/javascript">
	var Test = new Validar();
</script>

<?php
// Função responsavel por chamar os arquivos necessarios conforme nome da class = arquivo.php
function __autoload($class_name){
	require_once  "class/" . $class_name . ".php";
}
// Cria o objeto Conectar da classe Config
$conectar = new Config();
// Cria o objeto Valores da classe Get
$valores = new Post();
// Atribui valores dados via pelo browser as variaveis abaixo
$nome = $valores->addPost("nome");
$idade = $valores->addPost("idade");
$sexo = $valores->addPost("sexo");
$id = $valores->addPost("id");
?>
<!-- Formulario -->
<form method="POST" name="formulario">
	<fieldset>
		<legend>Atualizando Dados</legend>
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
	<span class="input-group-addon" id="basic-addon1">Id</span>
	<input type="text" name="id" placeholder="Id" class="form-control" aria-describedby="basic-addon1">
	</div>
	

	<button type="submit" class="btn btn-default navbar-btn" onclick="return Test.ValidUpdate(nome,idade,sexo,id)">Atualizar</button>
	</fieldset>
</form>
<?php
// Prepara o update
if(!empty($nome) && !empty($idade) && !empty($sexo) && !empty($id)){

$up = $conectar->PDO()->prepare("SELECT * FROM usuario WHERE id=:id");
$up->bindValue(":id",$id);
$up->execute();
if($up->rowCount() <= 0){
	echo "<h4>Usuario não deletado! Verifique a id digitada.</h4>";
	return false;
}else{
$up = $conectar->PDO()->prepare("UPDATE usuario SET nome = :nome , idade = :idade , sexo = :sexo WHERE id = :id");
$up->bindValue(":nome",$nome);
$up->bindValue(":idade",$idade);
$up->bindValue(":sexo",$sexo);
$up->bindValue(":id",$id);
// Executa o update
$up->execute();
if($up->rowCount() > 0):
	echo "<h4>Usuario atualizado</h4>";
else:
	echo "<h4>Usuario não atualizado</h4>";
endif;

};
};
?>
</body>
</html>