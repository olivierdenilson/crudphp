<?php session_start(); ?>

<?php include_once("includes/head.php");
      include_once("includes/conexao.php");
?>

<?php

 
 $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

 //criando consulta no banco de dados
 $consulta_usuario = "SELECT * FROM usuarios WHERE id= '$id'";
 $execultar_consulta = mysqli_query($conn, $consulta_usuario);
 $resultado = mysqli_fetch_assoc($execultar_consulta);

?>

<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>


<div class="container">
<h1> Editar Usuário </h1>

<form method="POST" action="includes/proc_editar.php">
  <div class="form-group">
    
      <input type="hidden" class="form-control" name="id" value="<?php echo $resultado['id']?>">
    
    <label for="formGroupExampleInput">Nome:</label>
    <input type="text" class="form-control" name="nome" value="<?php echo $resultado['nome']?>">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">E-mail</label>
    <input type="email" class="form-control" name="email" value="<?php echo $resultado['email']?>">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Senha</label>
    <input type="password" class="form-control" name="senha" value="<?php echo $resultado['senha']?>">
  </div>

  <div class="form-group">
  <button type="submit" class="btn btn-info" name="editar">Editar</button>
  
  </div>

</form>

</div>






















<?php include_once("includes/foot.php");?>