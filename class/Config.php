<?php
// Classe de configuração do banco de dados
class Config {
// Atributo pdo que ira receber a conexao do MYSQL;
	private $pdo;
// Cria o metodo responsavel pela conexao;
	public function PDO(){
	// Realiza a conexao utilizando (try) para testes de erro;
		try{
			$this->pdo = new PDO("mysql:host=localhost:3306;dbname=test","root","15031996");
		}catch(PDOException $e){
			// Exibe uma mensagem de erro caso a conexao não seja bem sucedida;
			return $e->getMessage();
		}
		// Chama o metodo getPDO que ira retorna a conexao contida no atributo $pdo;
		return $this->getPDO();
	}
// Cria o metodo responsavel por retornar a conexao.
	public function getPDO(){
		return $this->pdo;
	}
	

}

?>