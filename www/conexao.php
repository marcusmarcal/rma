<?php

$mysql_server = "rma-mysql";
$mysql_user = "root";
$mysql_pass = "uSD97a!@12?";
$mysql_db = "rma";


$conexao = mysqli_connect($mysql_server, $mysql_user, $mysql_pass) or die("N&atilde;o foi possivel conectar ao banco!!" . $mysql_error);

$banco = mysql_select_db($mysql_db, $conexao);
