<?php
session_start();

// conexao com o banco de dados
include_once('conexao.php');

// pegando os dados do formulario via post

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senhas = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$senha= md5($senhas);


// criando o script para incluir no banco de
$result_usuario = "INSERT INTO usuarios (nome, email, senha, created) VALUES ('$nome','$email', '$senha', NOW())";

// execultando a quey
$resultado = mysqli_query($conn, $result_usuario);

// validar os campos vazios

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: /crud/crudphp/cadastro.php");
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
    header("Location: /crud/crudphp/cadastro.php");
	
}


?>