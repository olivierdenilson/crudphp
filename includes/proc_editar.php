<?php
session_start();

// conexao com o banco de dados
include_once('conexao.php');

// pegando os dados do formulario via post
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senhas = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$senha= md5($senhas);


// criando o script para incluir no banco de
$result_usuario = "UPDATE usuarios SET nome='$nome', email='$email', senha='$senha', modified=NOW() WHERE id ='$id'";

// execultando a quey
$resultado = mysqli_query($conn, $result_usuario);

// validar os campos vazios

if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p style='color:green;'>Usuário Editado com sucesso</p>";
	header("Location: /crud/crudphp/listar.php");
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi Editado </p>";
    header("Location: /crud/crudphp/listar.php?id=$id");
	
}



?>