<?php include_once("includes/head.php");
      include_once('includes/conexao.php');
?>

<div class="container">

<h1> Listas -  Usuários </h1>

<table class="table table-hover">
  <thead>
    <tr>
            <th class="table-success" scope="col">Código</th>
            <th class="table-success" scope="col">Nome</th>
            <th class="table-success" scope="col">E-mail</th>
            <th class="table-success" scope="col">Senha</th>
            <th class="table-success" scope="col">Ações</th>
    </tr>
  </thead>


<?php
    
     // trazendo os resultado do banco de dados
     $result_usuarios = "SELECT * FROM usuarios";
     $resutado = mysqli_query($conn, $result_usuarios);

     while($resultado = mysqli_fetch_assoc( $resutado))
{?>

<div>
  <tbody>
       <tr>
            <th><?php echo $resultado['id'] ?> </th>
            <td><?php echo $resultado['nome'] ?></td>
            <td><?php echo $resultado['email'] ?></td>
            <td><?php echo $resultado['senha'] ?></td>
            <td><a class="btn btn-outline-info" href="#">Editar</a>  <a  class="btn btn-outline-danger" href="#">Excluir</a></td>
    </tr>

<?php } ?>

</tbody>
</table>


<nav aria-label="Navegação de página exemplo">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
  </ul>
</nav>


</div>
<?php include_once("includes/foot.php");?>






