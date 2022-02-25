
<index class="html"></index>
<!DOCTYPE html>
<html>
	<head>
		<title>Index</title>
		<meta charset="utf-8"> 
	</head>
	<style>
	
			input.sair
			{
			background-color: #ff3823;
			border-radius: 120px;
			color: white;
			background-color:#ff3823;
			border-color:#ff3823 ;
		}

		input.apagar {
			background-color: #ff6347;
			color: black;
			border-color:#ff6347 ;
			background-color: #ff6347;
			padding: 5px;
		}

		input.alterar{
			color: #ffa834;
			color: black;
			border-color:#ffa834;
			background-color: #ffa834;
			padding: 5px;
		}
		 
		input{
			font-weight: bold;
			border-radius: 30px;
			margin-bottom: 12px;
			
			
		}

		h1{
			font-style: italic;
		}

	</style>
		
<body>

	<h1>Alterar Vacina</h1>
	<form action="/action.page.php" method="Get">

	 	<input class="sair" type="button" value="X" onclick="">

		 <br>
		<label for="nome_vacina_alterar"> Nome da vacina:</label> 
		<input type="text" id="nome_vacina_alterar" name="nome_vacina_alterar" value="" required>

		<br>
		<label style="width: 10px;" for=ano_atual_alterar> Ano atual: <input type="text" id=ano_atual_alterar name="ano_atual_alterar" min="4" max="4"/></label>
		

		<br>
		<label for=n_dose_alterar> Número de doses: <input type="number" id=n_dose_alterar name="n_dose_alterar" min="1" max="6"/></label>

		<br>
		<label for=cor_alterar> cor </label>
		<input type="color" id=cor name="cor_alterar" value="arco iris"/>
		<br>
		
				
		<input class="apagar" type="button" value="Excluir Vacina" onclick="">  
		
		<div id="sair">
		<input class="alterar" type="submit" value="Alterar">
		</div>

	</form>




</body>



</html>