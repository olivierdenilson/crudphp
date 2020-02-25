<?php session_start(); ?>

<?php include_once("includes/head.php");?>

<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>


<div class="container">
<h1> Cadastro de Usuário </h1>

<form method="POST" action="includes/processa.php">
  <div class="form-group">
    <label for="formGroupExampleInput">Nome:</label>
    <input type="text" class="form-control" name="nome" placeholder="Seu Nome Completo">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">E-mail</label>
    <input type="email" class="form-control" name="email" placeholder="Seu E-mail" require>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Senha</label>
    <input type="password" class="form-control" name="senha" placeholder="Senha">
  </div>

  <div class="form-group">
  <button type="submit" class="btn btn-success" name="salvar" value="Cadastrar">Cadastrar</button>
  <button type="reset" class="btn btn-secondary" name="salvar" value="Cadastrar">limpar</button>
  </div>

</form>

</div>






















<?php include_once("includes/foot.php");?>