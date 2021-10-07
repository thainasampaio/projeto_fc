<?php 

include_once 'bd.php';
 
	// pega os dados do formuário
	$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
	$email = isset($_POST['email']) ? $_POST['email'] : null;
	$escola = isset($_POST['escola']) ? $_POST['escola'] : null;
	$id = isset($_POST['id']) ? $_POST['id'] : null;

	$conn = db_connect();

	$sql = "UPDATE usuario SET $nome=':NOME', $email=':EMAIL', $escola=':ESCOLA' WHERE $id=':ID'";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':NOME', $nome);
	$stmt->bindParam(':EMAIL', $email);
	$stmt->bindParam(':ESCOLA', $escola);

	// PARAM_INT: diz que a variavel vai receber um numero
	$stmt->bindParam(':ID', $id, PDO::PARAM_INT);

	if ($stmt->execute()) {
		Header('Location: listar.php');
	}else{
		// print_r: mostra em forma de array
		 print_r($stmt->errorInfo());
	}

?>