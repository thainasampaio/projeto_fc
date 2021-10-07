<?php 

	include_once 'bd.php';

	$id = isset($_POST['id']) ? $_POST['id'] : null;

	$conn = db_connect();
	$sql = "DELETE FROM usuario WHERE id = :ID";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':ID', $id, PDO::PARAM_INT);

	if ($stmt->execute())
	{
	    header('Location: form-list.php');
	}
	else
	{
	    echo "Erro ao remover";
	    print_r($stmt->errorInfo());
	}

?>