<?php
session_start();

// conexao com o banco de dados
include_once('conexao.php');

// pegando os dados do formulario via post

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senhas = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$senha= md5($senhas);


//echo "Nome.: ". $nome ."<br>";
//echo "E-mail.: " . $email . "<br>";
//echo "Senha.:" . $senha . "<br>";

// criando o script para incluir no banco de
$result_usuario = "INSERT INTO usuarios (nome, email, senha, created) VALUES ('$nome','$email', '$senha', NOW())";

// execultando a quey
$resultado = mysqli_query($conn, $result_usuario);

// validar os campos vazios

if($nome==null){
    $_SESSION['vazio'] = "<p style='color:red;'>Preencha o campo $nome </p>";
}if($email==null){
    $_SESSION['vazio'] = "<p style='color:red;'>Preencha o campo $email </p>";
}if($senha==null){
    $_SESSION['vazio'] = "<p style='color:red;'>Preencha o campo $senha </p>";
}if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: /projetocrudphp/cadastro.php");
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
    header("Location: /projetocrudphp/cadastro.php");
	
}






?>