<?php
$mysql_server = "localhost";
$mysql_user = "usuario";
$mysql_pass = "senha";
$mysql_db = "rma";
#$conexao = mysql_connect($mysql_server, $mysql_user, $mysql_pass) or die("N&atilde;o foi possivel conectar ao banco!!" . $mysql_error);
$conexao = mysqli_connect($mysql_server, $mysql_user, $mysql_pass) or die("N&atilde;o foi possivel conectar ao banco!!" . $mysql_error);
$banco = mysqli_select_db($conexao, $mysql_db);
?>
