<?php 

	include_once 'bd.php';
	 
	// abre a conexão
	$conn = db_connect();
	// SQL para selecionar os registros
	// asc ordem crescente
	$sql = "SELECT id, nome, email, escola FROM usuario ORDER BY nome ASC";
	 
	// seleciona os registros
	$stmt = $conn->prepare($sql);
	$stmt->execute();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>CRUD Thainá</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="form">
		<table class="table container">
			<thead class="bg-primary text-white text-center">
				<tr>
					<th>Nome</th>
					<th>Email</th>
					<th>Escola</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					 <?php
				        include_once 'bd.php';

				        // query: faz uma consulta no banco
			            $consulta = $conn->query("SELECT * FROM usuario");
			            
			            // fetch: lista os dados em forma de vetor
			            // linha: vai percorrer todos os dados no banco de dados e listar depois
			            // fetch_assoc: tirar os indices do vetor, tira as casas do vetor. Ex.: um vetor ele vem assim: 01: thaina, 02:vito, 03:jully, quando coloca o fetch assoc, esses numeros eles saem, entao vai ficar thaina, victor, jully
			            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
			                //DADOS DO BD
			                echo "

			                	<tr> 
                            		<td align='center'>{$linha['nome']} </td>
                            		<td align='center'>{$linha['email']} </td>
                            		<td align='center'>{$linha['escola']} </td>
	                            	<td align='center'>
	                                	<a href='form_edit.php?id={$linha['id']}'><i class='fas fa-edit text-primary ml-5' style='font-size:23px;'></i></a>
	                                	<a href='delete.php?id={$linha['id']}'><i class='fas fa-times-circle text-danger ml-4' style='font-size:23px;'></i></a>
	                            	</td>
                            	</tr>
			                ";
						}
                    
                ?>
				</tr>
			</tbody>
		</table>
	</div>

	<script type="text/javascript" src="js/all.min.js"></script>
</body>
</html>