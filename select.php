<!DOCTYPE html>
<html>
<head>
	<title>Buscando Dados</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css"/>
    <script type="text/javascript" src="_script/Validar.js"> </script>
    <!-- Bootstrap -->
   <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
</head>
<body>

<div id="menu">
<div class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-default" "><a href="insert.php">Insert</a></button>
  <button type="button" class="btn btn-default"><a href="update.php">Update</a></button>
  <button type="button" class="btn btn-default"><a href="delete.php">Delete</a></button>
</div>
</div>
<?php
// Função Responsavel por chamar a pagina com o nome da classe.
function __autoload($class_name){
	require_once "class/". $class_name . ".php";
 }

// Declara o objeto Conexao da Classe Config;
$conexao = new Config();
// Declara o objeto da classe Post Responsavel por criar $_POST[""]
$valores = new Post();

// Cria $_POST["id"] chamando o metodo addPost
$id = $valores->addPost("id");
// Cria $_POST["nome"] chamando o método addPost
$nome = $valores->addPost("nome");

$data =  date('d/m/y') ;
?>
<!-- Função responsavel por exibir todos os dados da tabela -->
<script type="text/javascript">
		// Função responsavel por exibir todos os registros na pagina.
	
	function Exibir(){
		document.getElementById("resultado").innerHTML = "<?php
		$bs = $conexao->PDO()->prepare('SELECT * FROM usuario');
$bs->execute();
$resultado = $bs->fetchALL(PDO::FETCH_OBJ);

foreach ($resultado as $listar){
	echo "<div class='input-group'>";
			echo "<span class='input-group-addon' id='basic-addon1'>Nome</span>". "<input type='text' name='Nome' placeholder='".$listar->nome ."' class='form-control' aria-describedby='basic-addon1'>";
			echo "<span class='input-group-addon' id='basic-addon1'>Ano</span>". "<input type='text' name='idade' placeholder='".$listar->idade ."' class='form-control' aria-describedby='basic-addon1'>";
			echo "<span class='input-group-addon' id='basic-addon1'>Sexo</span>". "<input type='text' name='sexo' placeholder='".$listar->sexo ."' class='form-control' aria-describedby='basic-addon1'>";
			echo "<span class='input-group-addon' id='basic-addon1'>Id</span>". "<input type='text' name='id' placeholder='".$listar->id ."' class='form-control' aria-describedby='basic-addon1'>";
			echo "</div>";

};  ?>";
// Faz com que a pagina não recarregue e assim não exiba todos os registros.
		 return false;

	};
</script>
<!-- Formulario -->
<form method="POST" name="formulario">
<fieldset>
	<legend>Buscar dados</legend>
</fieldset>
<div class="input-group">
	<span class="input-group-addon" id="basic-addon1">Nome</span>
	<input type="text" name="nome" placeholder="Nome" class="form-control" aria-describedby="basic-addon1">
	<span class="input-group-addon" id="basic-addon1">ID</span>
	<input type="text" name="id" placeholder="Id" class="form-control" aria-describedby="basic-addon1">	
	</div>

	<button type="submit" class="btn btn-default navbar-btn" onclick="return Validar_Select()">Enviar</a></button>
	
	<button type="buttom" class="btn btn-default navbar-btn" name="tudo" onclick="return Exibir()">Exibir Tudo</button>

</form>
<div id="resultado">

<?php
if(!empty($nome) || !empty($id)){
// Prepara chamando o metodo PDO da classe Config;
$bs = $conexao->PDO()->prepare("SELECT * FROM usuario WHERE id=:id or nome=:nome ");
$bs->bindValue(":id",$id,PDO::PARAM_INT);
$bs->bindValue(":nome",$nome);
//Executa o codigo acima
$bs->execute();

// Realiza a busca e retorna um objeto
$linha = $bs->fetchAll(PDO::FETCH_OBJ);

	// Percorre todos os objetos retornados
		foreach ($linha as $listar) {
			echo "<div class='input-group'>";
			echo "<span class='input-group-addon' id='basic-addon1'>Nome</span>". "<input type='text' name='Nome' placeholder='".$listar->nome ."' class='form-control' aria-describedby='basic-addon1'>";
			echo "<span class='input-group-addon' id='basic-addon1'>Idade</span>". "<input type='text' name='idade' placeholder='".$listar->idade ."' class='form-control' aria-describedby='basic-addon1'>";
			echo "<span class='input-group-addon' id='basic-addon1'>Sexo</span>". "<input type='text' name='sexo' placeholder='".$listar->sexo ."' class='form-control' aria-describedby='basic-addon1'>";
			echo "<span class='input-group-addon' id='basic-addon1'>Id</span>". "<input type='text' name='id' placeholder='".$listar->id ."' class='form-control' aria-describedby='basic-addon1'>";
			echo "</div>";
		}
		}
	?>

</div>



</body>
</html>