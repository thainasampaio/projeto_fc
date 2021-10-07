<?php
 
include_once 'bd.php';
 
// pega os dados do formuário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$escola = isset($_POST['escola']) ? $_POST['escola'] : null;
 
// validação (bem simples, só pra evitar dados vazios)
if (empty($nome) || empty($email) || empty($escola)){
    echo "Volte e preencha todos os campos";
    exit;
}
// insere no banco
$conn = db_connect();
$sql = "INSERT INTO usuario(nome, email, escola) VALUES(:NOME, :EMAIL, :ESCOLA)";
// prepare: prepara o codigo
$stmt = $conn->prepare($sql);
//stmt: statement
// bindParam: pega a variavel e joga valores para dentro dela, os valores sao os parametros. Ex. de parametro: :NOME
$stmt->bindParam(':NOME', $nome);
$stmt->bindParam(':EMAIL', $email);
$stmt->bindParam(':ESCOLA', $escola);
 
// execute: executa o codigo
if ($stmt->execute()){
	// header: diz que vai enviar pra algum lugar a partir do Location
    header('Location: index.php');
}
else{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}