<?php include_once("includes/head.php");
      include_once('includes/conexao.php');
?>


<h1> Lista de Usuário </h1>

<?php
    
     // trazendo os resultado do banco de dados
     $result_usuarios = "SELECT * FROM usuarios";
     $resutado = mysqli_query($conn, $result_usuarios);

     while($resultado = mysqli_fetch_assoc( $resutado)){

        echo $resultado['id'] . "<br>";
        echo $resultado['nome'] . "<br>";
        echo $resultado['email'] . "<br>";
        echo $resultado['senha'] . "<br> <hr>";

   }

?>

<?php include_once("includes/foot.php");?>






