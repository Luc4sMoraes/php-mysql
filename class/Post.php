<?php

//Cria a classe Post
class Post{
	//Cria a variavel que ira receber o valor do post.
	private $valor;

	// Cria o metodo que ira pegar o valor enviado pelo formulario via post.
	public function addPost($v){
		if(!empty($_POST[$v])){
			$this->valor = addslashes(trim($_POST[$v]));
			return $this->getValor();
		}
	}
		// Retorna o valor de post
			 function getValor(){
				return $this->valor;
			}
	
}







?>