<?
require("padrao.php");
if(!isset($atualm) OR ($atualy)){
$atualm = date('m');
$atualy = date('Y');
}
$sql = "select * from visadas where status = \"fim\" and data_solic > \"2007-02-28\" order by
fechado desc, viabilidade desc, data_solic desc";
if($nome == "SIM Telecom"){
$sql = "select * from visadas where vendedor = 'SIM Telecom' order by id desc";
echo "<center><b>Visadas SIM Telecom<br><br>";
}
$resultado = mysql_query($sql) or die(mysql_error());

?>
<h1 align=center>Relatório Geral de Visadas</h1>
<h3 align=center>desde março de 2007</h3>
<hr>
<table border="1" cellpadding="0" cellspacing="0" align="center" width="100%"
class="impressao">
<tr>
<td></td>
<th><a href="?ordem=vendedor"><? if($ordem == vendedor){ ?><font color=red><? } ?>Comercial</a></th>
<th><a href="?ordem=cidade"><? if($ordem == cidade){ ?><font color=red><? } ?>Cidade</th>
<th><a href="?ordem=nome_cliente"><? if($ordem == nome_cliente){ ?><font color=red><? } ?>Nome Cliente</th>
<!--<th><a href="?ordem=endereco"><? if($ordem == endereco){ ?><font color=red><? } ?>Endereço</th>-->
<th><a href="?ordem=data_solic"><? if($ordem == data_solic){ ?><font color=red><? } ?>Data Solicitação</th>
<th><a href="?ordem=status"><? if($ordem == status){ ?><font color=red><? } ?>Status</th>
<th><a href="?ordem=viabilidade"><? if($ordem == viabilidade){ ?><font color=red><? } ?>Viabilidade</th>
<!--<th><a href="?ordem=fechado"><? if($ordem == fechado){ ?><font color=red><? } ?>Fechamento</th>-->
</tr>
<?
$num = 1;
while($linha = mysql_fetch_array($resultado)){
$id = $linha['id'];
$vendedor = $linha['vendedor'];
$nome_cliente = $linha['nome_cliente'];
$endereco = $linha['endereco'];
$cidade = $linha['cidade'];
$condominio = $linha['condominio'];
$plano = $linha['plano'];
$valor_ativ = $linha['valor_ativ'];
$valor_mens = $linha['valor_mens'];
$status = $linha['status'];
$data_solic = $linha['data_solic'];
$data_resp = $linha['data_resp'];
$viabilidade = $linha['viabilidade'];
$fechado = $linha['fechado'];

switch ($status) {
   case "fim":
       $status = "<font color=\"black\"><b>Finalizado";
       break;
   case "pend_tec":
       $status = "<font color=\"red\"><b>Pendente Técnica";
       break;
   case "pend_com":
       $status = "<font color=\"green\"><b>Pendente Comercial";
       break;
   case "cancelado":
       $status = "<font color=\"orange\"><b>Cancelado";
       break;
}
switch ($viabilidade) {
   case "sim":
       $viabilidade = "<font color=\"green\"><b>POSITIVA";
       break;
   case "não":
       $viabilidade = "<font color=\"red\"><b>NEGATIVA";
       break;
}
switch ($fechado) {
   case "sim":
       $fechado = "<font color=\"green\" size=\"2\"><b>SIM";
       break;
   case "não":
       $fechado = "<font color=\"red\" size=\"2\"><b>NÃO";
       break;
}

?>
<tr>
<td><? echo $num; ?>
<td>&nbsp;<? echo $vendedor; ?></td>
<td>&nbsp;<? echo $cidade; ?></td>
<td>&nbsp;<a href="visual.php?id=<? echo $id; ?>"><? echo $nome_cliente; ?></td>
<!--<td>&nbsp;<? echo $endereco; ?></td>-->
<td>&nbsp;<? echo converte_data($data_solic); ?></td>
<td>&nbsp;<? echo $status; ?></td>
<td>&nbsp;<? echo $viabilidade; ?></td>
<!--<td>&nbsp;<? echo $fechado; ?></td>-->
</tr>
<?
$num++;
}
?>
</BODY>
</HTML>
