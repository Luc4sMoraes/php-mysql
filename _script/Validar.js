function Validar(){
	var nome;
	var idade;
	var sexo;
	var id;
	this.ValidInsert = ValidInsert;
	this.ValidUpdate = ValidUpdate;
	this.ValidSelect = ValidSelect;

		function ValidInsert(_nome,_idade,_sexo){
			this.nome = _nome.value;
			this.idade = _idade.value;
			this.sexo = _sexo.value

			if(this.nome == ""){
				_nome.focus();
				return false;
			}else if(this.idade == ""){
				_idade.focus();
				return false;
			}else if(this.sexo == ""){
				_sexo.focus();
				return false;
			};
			
		};

		function ValidUpdate(_nome,_idade,_sexo,_id){
			this.nome = _nome.value;
			this.idade = _idade.value;
			this.sexo = _sexo.value;
			this.id = _id.value;

			if(this.nome == ""){
				_nome.focus();
				return false;
			}else if(this.idade == ""){
				_idade.focus();
				return false;
			}else if(this.sexo == ""){
				_sexo.focus();
				return false;
			}else if(this.id == ""){
				_id.focus();
				return false;
			};

		};

		function ValidSelect(n,i){
			this.nome = n.value;
			this.id = i.value;

			if(this.nome == "" || this.id == ""){
				n.focus();
				return false;
			};
		};

		


};




