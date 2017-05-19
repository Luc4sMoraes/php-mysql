<?php
function __autoload($class_name){
	require_once "class/" . $class_name . ".php";
}

$conexao = new Config();

// Inicio da Transação
$conexao->PDO()->beginTransaction();

// Cadastro dos Dados
$dados = $conexao->PDO()->query("INSERT INTO dados(status) Values ('1')");
if(!$dados){
	die ("Houve um erro no cadastro de dados");
}
// Cadastro Final
$cadastro = $conexao->PDO()->query("INSERT INTO test (nome,idade,sexo,status) VALUES ('eu',21,'M',1)");
if(!$cadastro){
	$conexao->PDO()-> rollBack();
	die("Houve um erro no cadastro final!");
}

// Confirmação da Transação
$conexao->PDO()->setAttribute(PDO::ATTR_AUTOCOMMIT,0);
$conexao->PDO()->commit();




?>