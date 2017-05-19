<!DOCTYPE>
<html>
<head>
	<title>Deletando Dados</title>
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
  <button type="button" class="btn btn-default" "><a href="insert.php">Insert</a></button>
  <button type="button" class="btn btn-default"><a href="update.php">Update</a></button>
  <button type="button" class="btn btn-default"><a href="select.php">Select</a></button>
</div>
</div>
<?php
function __autoload($class_name){
	require_once "class/" . $class_name . ".php";
}
// Chama a classe Config
$conexao = new Config();
//Chama a classe Get
$get = new Get();
// Chama $_GET["id"]
$id = $get->addGet("id");


?>
<script type="text/javascript">
	function ExibirTudo(){
		var elemento = document.getElementById("resultado");
		elemento.innerHTML = "";

	return false;
	};
</script>

<div id="resultado">
<?php
if(!empty($id)){
// Prepara para delatar a linha conforme ID
$de = $conexao->PDO()->prepare("DELETE FROM usuario  WHERE id=?");
$de->bindValue(1,$id,PDO::PARAM_INT);
// Executa o procedimento
$de->execute();
// Verifica se a linha foi deletada e retorna mensagem O.o
if($de->rowCount()>0):
	echo "<h4>Usuario deletado com sucesso!</h4>";
else:
	echo "<h4>Ooops, nenhum usuario foi deletado! Verifique a ID digitada.</h4>";
endif;
};
?>

<?php
$search = $conexao->PDO()->prepare("SELECT * FROM usuario");
$search->execute();

$result = $search->fetchALL(PDO::FETCH_OBJ);
if($search->rowCount() <= 0){
	echo "<h4>Nenhum Usuário encontrado</h4>";
};
foreach ($result as $value) {
	echo "<div class='input-group'>";
			
			echo "<span class='input-group-addon' id='basic-addon1'>Nome</span>". "<input type='text' name='Nome' placeholder='".$value->nome ."' class='form-control' aria-describedby='basic-addon1'>";
			echo "<span class='input-group-addon' id='basic-addon1'>Idade</span>". "<input type='text' name='idade' placeholder='".$value->idade ."' class='form-control' aria-describedby='basic-addon1'>";
			echo "<span class='input-group-addon' id='basic-addon1'>Sexo</span>". "<input type='text' name='sexo' placeholder='".$value->sexo ."' class='form-control' aria-describedby='basic-addon1'>";
			echo "<span class='input-group-addon' id='basic-addon1'>Id</span>". "<input type='text' name='id' placeholder='".$value->id ."' class='form-control' aria-describedby='basic-addon1'>";
echo "<span class='input-group-addon' id='basic-addon1'><a href='?id=".$value->id."' onclick='return Excluir()'>Excluir</a></span>";
			echo "</div>";
};



?>
</div>

</body>