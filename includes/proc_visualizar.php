<?php
include_once("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$resultado="";
    
$query_user = "SELECT * FROM usuarios WHERE id='$id' LIMIT 1";
    
    $resultado_user = mysqli_query($conn, $query_user);
    
	$row_user = mysqli_fetch_assoc($resultado_user);
	
	$resultado .= '<dl class="row">';
	
	$resultado .= '<dt class="col-sm-3">ID</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['id'].'</dd>';
	
	$resultado .= '<dt class="col-sm-3">Nome</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['nome'].'</dd>';
	
	$resultado .= '<dt class="col-sm-3">E-mail</dt>';
    $resultado .= '<dd class="col-sm-9">'.$row_user['email'].'</dd>';

    $resultado .= '<dt class="col-sm-3">Senha</dt>';
	$resultado .= '<dd class="col-sm-9">'.$row_user['senha'].'</dd>';
		
	$resultado .= '</dl>';
	
	echo $resultado;

?>