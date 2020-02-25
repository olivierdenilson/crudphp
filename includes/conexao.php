<?php

// definindo as variaveis de banco de dados

$SERVIDOR    = "localhost";
$USER        = "root";
$PASSWORD    = "";
$DBNAME      = "aulacrud";


// fazendo a conexão com o servidor
$conn = mysqli_connect($SERVIDOR, $USER , $PASSWORD, $DBNAME);

?>
