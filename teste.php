<?
require("padrao.php");
if(!isset($atualm) OR ($atualy)){
$atualm = date('m');
$atualy = date('Y');
}
$sql = "select * from ativacoes where status = 'pend_ass' or status = 'ok' order by
data_ativ";

$resultado = mysql_query($sql) or die(mysql_error());
?>
<table border="1" align="center" width="65%" cellpadding="1" cellspacing="0">
<tr>
<td align="center"><a href="controle.php"><font color="purple">Controle</font></a></td>
<td align="center"><a href="infra.php"><font color="orange">Infra</a></font></td>
<td align="center"><a href="conf.php"><font color="green">Config</font></a></td>
<td align="center"><a href="new.php"><font color="red">Solicitar Ativação / Confecção de Boletim</font></a></td>
<td align="center">
<form method="get" action="" >
<select name="status_search">
<option value="all">Todos</option>
<option value="ok">Status OK</option>
<option value="pend_com">Pendente Comercial</option>
<option value="pend_tec">Pendente Técnica</option>
<option value="pend_infra">Pendente Infra</option>
<option value="pend_cobr">Pendente Cobrança</option>
<option value="pend_conf">Pendente Configuração</option>
<option value="pend_ass">Pendente Assinatura</option>
<option value="cancelado">Cancelado</option>
</select><input type="submit" value="Filtrar"></form>
<?
if(isset($status_search)) echo "<font color=red>Filtro aplicado: " .  $status_search . "<br>";
?>
</td>
</tr>
</table>
<?
?>
<hr>
<table border="1" cellpadding="0" cellspacing="0" align="center" width="100%">
<tr>
<td></td>
<th>Condomínio</th>
<th>Nome Cliente</th>
<th>Data Ativação</th>
<th>Valor Ativação</th>
<th>Valor Mensal</th>
</tr>
<?
$num = 1;
while($linha = mysql_fetch_array($resultado)){
$id = $linha['id'];
$vendedor = $linha['vendedor'];
$nome_cliente = $linha['nome_cliente'];
$endereco = $linha['endereco'];
$condominio = $linha['condominio'];
$plano = $linha['plano'];
$valor_ativ = $linha['valor_ativ'];
$valor_mens = $linha['valor_mens'];
$status = $linha['status'];
$data_aceite = $linha['data_aceite'];
$data_solic = $linha['data_solic'];
$data_ativ = $linha['data_ativ'];
$data_cobr = $linha['data_cobr'];
$data_1mens = $linha['data_1mens'];

switch ($plano) {
   case "business":
       $plano = "Computech Business";
       break;
   case "business_ip":
       $plano = "Computech Business + IP Válido";
       break;
   case "home":
       $plano = "Computech Home";
       break;
   case "home_ip":
       $plano = "Computech Home + IP Válido";
       break;
   case "light":
       $plano = "Computech Light";
       break;
   case "access":
       $plano = "Computech Access";
       break;
   case "server":
       $plano = "Computech Server";
       break;
}

switch ($status) {
   case "ok":
       $status = "Tudo OK";
       break;
   case "pend_com":
       $status = "Pendente Comercial";
       break;
   case "pend_tec":
       $status = "Pendente Técnica";
       break;
   case "pend_infra":
       $status = "Pendente Infra";
       break;
   case "pend_cobr":
       $status = "Pendente Cobrança";
       break;
   case "pend_conf":
       $status = "Pendente Configuração";
       break;
   case "pend_ass":
       $status = "Pendente Ass. Boletim";
       break;
   case "cancelado":
       $status = "Cancelado";
       break;
}
switch ($vendedor) {
   case "marcello":
       $vendedor = "Marcello";
       break;
   case "val":
       $vendedor = "Valderez";
       break;
   case "bl":
       $vendedor = "Banda Larga";
       break;
   case "lu":
       $vendedor = "Luciano";
       break;

}

?>
<tr>
<td><? echo $num; ?>
<td>&nbsp;<? echo $condominio; ?></td>
<td>&nbsp;<a href="visual.php?id=<? echo $id; ?>"><? echo $nome_cliente; ?></td>
<td>&nbsp;<? echo converte_data($data_ativ); ?></td>
<td>&nbsp;<? echo "R$ "; printf("%01.2f", $valor_ativ); ?></td>
<td>&nbsp;<? echo "R$ "; printf("%01.2f", $valor_mens); ?></td>
</tr>
<?
$num++;
}
?>
</BODY>
</HTML>
