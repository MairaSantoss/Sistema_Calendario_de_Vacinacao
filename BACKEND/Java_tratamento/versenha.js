
			function validar(){ 
				var senha = document.getElementById("senha").value; 
				var confirmesenha = document.getElementById("confirmesenha").value; 
				console.log(senha);
				console.log(confirmesenha);
		
				
				if(senha == "" || senha.length <= 5){
					alert('Preencha o campo senha com maximo 6 caracteres');
					document.getElementById("senha").focus();
					return false;
				}
				
				if(confirmesenha == "" || confirmesenha.length <= 5){
					alert('Preencha o campo senha com minimo 6 caracteres');
					document.getElementById("confirmesenha").focus();
				
					return false;
				}
				
				
				if (senha != confirmesenha) {
					alert('Senhas diferentes');
					document.getElementById("senha").focus();
					return false;
				}
				
			}
		