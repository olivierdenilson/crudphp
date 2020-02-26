<?php include_once("includes/head.php");
      include_once('includes/conexao.php');
?>

<div class="container">

<h1> Listas -  Usuários </h1>


<!--Estrutura da Tabela html -->
<table class="table table-hover">
  <thead>
    <tr>
            <th class="table-success text-center" scope="col">Código</th>
            <th class="table-success" scope="col">Nome</th>
            <th class="table-success" scope="col">E-mail</th>
            <th class="table-success" scope="col">Senha</th>
            <th class="table-success text-center" scope="col">Ações</th>
    </tr>
  </thead>

<?php
    
    // Receber o número da página
    $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
    $pagina = (!empty($pagina_atual))?$pagina_atual:1;

    // Setar a quantidade de pagina de itens por página
    $qnt_result_pg = 5;
    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

     // trazendo os resultado do banco de dados
     $result_usuarios = "SELECT * FROM usuarios LIMIT $inicio, $qnt_result_pg";

     //execultando a instrução SQL
     $resutado = mysqli_query($conn, $result_usuarios);

    //percorrendo a linha no banco de dados 
     while($resultado = mysqli_fetch_assoc( $resutado))
{?>


<div>
  <tbody>
       <tr>
            <th class="text-center"><?php echo $resultado['id'] ?> </th>
            <td><?php echo $resultado['nome'] ?></td>
            <td><?php echo $resultado['email'] ?></td>
            <td><?php echo $resultado['senha'] ?></td>
            <td class="text-center"><a class="btn btn-outline-info" href="#">Editar</a>
            <a class="btn btn-outline-danger" href="#">Excluir</a>
            <a class="btn btn-outline-dark" href="#">Visualizar</a>
          </td>
    </tr>

<?php } ?>

</tbody>
</table>


<?php

    $result_pg = "SELECT COUNT(id) AS num_result FROM usuarios";
    $resultado_pg = mysqli_query($conn , $result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);

    //echo $row_pg['num_result'];
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

    // Limitar os Links antes e depois
    $max_links = 2;

    /*echo "<a href='listar.php?pagina=1'> Primeira </a>";

    for($pag_ant = $pagina - $max_links; $pag_ant <=$pagina -1; $pag_ant++) {
        if($pag_ant >=1){
          echo "<a href='listar.php?pagina=$pag_ant'>$pag_ant</a>";
        }
    }

    echo "$pagina"; // página atual

    for($pag_dep = $pagina +1 ; $pag_dep <=$pagina + $max_links; $pag_dep++){

      if($pag_dep <= $quantidade_pg){
         echo "<a href='listar.php?pagina=$pag_dep'>$pag_dep</a>";
      }

    }

    echo "<a href='listar.php?pagina=$quantidade_pg'> Ultima </a>"; */


?>

<!-- Layout da Páginação -->

<nav aria-label="Navegação de página exemplo">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="listar.php?pagina=1">Anterior</a></li>
    
    <?php
          for($pag_ant = $pagina - $max_links; $pag_ant <=$pagina -1; $pag_ant++) {
          
            if($pag_ant >=1){

            echo "<li class='page-item'><a class='page-link' href='listar.php?pagina=$pag_ant'>$pag_ant</a></li>";
          }
        } ?>
       
       
       <li class="page-item active">
           <a class="page-link" href="listar.php?pagina=<?php echo $pagina?>"> <span class="sr-only">
           </span><?php echo $pagina?></a>
      </li>


   <?php 
        for($pag_dep = $pagina +1 ; $pag_dep <=$pagina + $max_links; $pag_dep++){

          if($pag_dep <= $quantidade_pg){

            echo "<li class='page-item'><a class='page-link' href='listar.php?pagina=$pag_dep'>$pag_dep</a></li>";

          }
    
        }
      
    ?>
       <li class="page-item"><a class="page-link" href="listar.php?pagina=<?php echo $quantidade_pg;?>">Ultima</a></li>
  </ul>
</nav>


<div class="col-12 text-center">
    <button class="btn btn-outline-success">Imprimir</button>
  </div>

</div>
<?php include_once("includes/foot.php");?>

