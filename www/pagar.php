
<?
include("padrao.php");
if($REMOTE_USER == 'alcyr'){
//if($REMOTE_USER == 'marcus'){
$pagar = "update ativacoes set comissao=\"$val\" where id=\"$id\"";
$update = mysql_query($pagar) or die (mysql_error());
echo "<h1>Alterado com Exito!";
?>
<meta http-equiv="Refresh" content="0; URL=controle.php">
<?
} else {
echo "<h1><font color=red>Usuário não autorizado...";
?>
<meta http-equiv="Refresh" content="2; URL=controle.php">
<? } ?>
