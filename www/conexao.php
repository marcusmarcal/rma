<?
$mysql_server = "url_do_servidor";
$mysql_user = "usuário";
$mysql_pass = "senha";
$mysql_db = "nome_do_banco";
$conexao = mysql_connect($mysql_server, $mysql_user, $mysql_pass) or die("N&atilde;o foi possivel conectar ao banco!!" . $mysql_error);
$banco = mysql_select_db($mysql_db, $conexao);
?>
