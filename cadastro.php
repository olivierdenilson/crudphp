<?php session_start(); ?>

<?php include_once("includes/head.php");?>

<h1> Cadastro de Usuário </h1>

<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>

<form method="POST" action="includes/processa.php">

<label>Nome: </label>
<input type="text" name="nome"  placeholder="Digite Seu nome completo">

<label>E-mail: </label>
<input type="email" name="email"  placeholder="Digite  Seu email">

<label>Senha: </label>
<input type="password" name="senha" placeholder="Digite sua Senha">

<input type="submit" name="salvar" value="Cadastrar">

<input type="reset" name="Limpar" value="Limpar">

</form>

<?php include_once("includes/foot.php");?>































<?php include_once("includes/foot.php");?>