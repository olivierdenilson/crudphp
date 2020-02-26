<?php
session_start();
include_once('conexao.php');

// pegando os dados do formulario via post


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "DELETE FROM usuarios WHERE id='$id'";
$resultado = mysqli_query($conn, $result_usuario);

// validar os para a função apagar
if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p style='color:green;'>Usuário Apagado com sucesso </p>";
	header("Location:/crud/crudphp/listar.php");
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi Apagado!! </p>";
    header("Location: /crud/crudphp/listar.php");
	
}


?>