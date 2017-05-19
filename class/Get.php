<?php
// Cria a classe Get responsavel por atribuir a requisição GET nas variaveis correspondentes!
class Get{
	// Variavel responsável por armazenar o valor de Get
	private $valor;

	//Função que atribui o get e retorna os valores deste!
	public function addGet($v){
		if(!empty($_GET[$v])){
		$this->valor = addslashes(trim($_GET[$v]));
		return $this->getValor();
	}
	}
	// Retorna os valores de get
	public function getValor(){
		return $this->valor;
	}
}

?>