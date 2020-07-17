<?
require("padrao.php");
if(!isset($atualm) OR ($atualy)){
$atualm = date('m');
$atualy = date('Y');
}
if(!isset($ordem)){
$sql = "select * from ativacoes where status like '%$status_search%' order by data_solic desc";
}elseif($ordem == "data_solic"){
$sql = "select * from ativacoes where status like '%$status_search%' order by data_solic desc";
}else{
$sql = "select * from ativacoes where status like '%$status_search%' order by '$ordem'";
}
$resultado = mysql_query($sql) or die(mysql_error());
?>
<h2 align="center"><font color="green">CONTROLE GERAL</h2>
<table border="1" align="center" width="20%" cellpadding="1" cellspacing="0">
<tr>
<!--
<td align="center">
<a href="new.php">Solicitar Ativação / Confecção de Boletim</a>
 <?// botao("Solicitar Ativação / Confecção de Boletim","new.php"); ?></td>
-->
<td align="center">
<form method="get" action="" >
<select name="status_search">
<option value="">Todos</option>
<option value="ok">Status OK</option>
<option value ="pend_com">Pendente Comercial</option>
<option value ="pend_tec">Pendente Técnica</option>
<option value ="pend_infra">Pendente Infra</option>
<option value ="pend_cobr">Pendente Cobrança</option>
<option value ="pend_conf">Pendente Configuração</option>
<option value ="pend_ass">Pendente Assinatura</option>
<option value ="cancelado">Cancelado</option>
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
<table border="1" cellpadding="0" cellspacing="0" align="center" width="200%">
<tr>
<th colspan="2">&nbsp;</th>
<th><a href="?ordem=vendedor"><? if($ordem == vendedor){ ?><font color=red><? } ?>Comercial</a></th>
<th><a href="?ordem=condominio"><? if($ordem == condominio){ ?><font color=red><? } ?>Condomínio</th>
<th><a href="?ordem=nome_cliente"><? if($ordem == nome_cliente){ ?><font color=red><? } ?>Nome Cliente</th>
<th><a href="?ordem=valor_ativ"><? if($ordem == valor_ativ){ ?><font color=red><? } ?>Valor
Ativação</th>
<th><a href="?ordem=valor_mens"><? if($ordem == valor_mens){ ?><font color=red><? }
?>Valor Mensal</th>
<th><a href="?ordem=data_solic"><? if($ordem == data_solic){ ?><font color=red><? } ?>Data Solicitação</th>
<th><a href="?ordem=data_ativ"><? if($ordem == data_ativ){ ?><font color=red><? } ?>Data
Ativação</th>
<th><a href="?ordem=data_cobr"><? if($ordem == data_cobr){ ?><font color=red><? } ?>Data
Cad. Cobrança</th>
<th><a href="?ordem=data_1mens"><? if($ordem == data_1mens){ ?><font color=red><? } ?>Data
Prim. Mensalidade</th>
<th><a href="?ordem=status"><? if($ordem == status){ ?><font color=red><? } ?>Status</th>
<th><a href="?ordem=comissao"><? if($ordem == comissao){ ?><font color=red><? } ?>Comissão</th>
</tr>
<?
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
$comissao = $linha['comissao'];

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
<td align=center><form method="get" action="pagar.php" style="font-size: 7pt; margin-top:
-1; margin-bottom: -1">
<input type="hidden" name="id" value="<? echo $id; ?>">
<input type="hidden" name="val" value="1">
<input type="submit" name="submit" value="Pago" style="margin-top: -1; margin-bottom:
-1; font-size: 11px; cursor: pointer">
</form>
</td>
<td align=center><form method="get" action="pagar.php" style="font-size: 7pt; margin-top:
-1; margin-bottom: -1">
<input type="hidden" name="id" value="<? echo $id; ?>">
<input type="hidden" name="val" value="0">
<input type="submit" name="submit" value="Não pago" style="margin-top: -1; margin-bottom:
-1; font-size: 11px; cursor: pointer">
</form>
</td>

<td>&nbsp;<? echo $vendedor; ?></td>
<td>&nbsp;<? echo $condominio; ?></td>
<td>&nbsp;<a href="visual.php?id=<? echo $id; ?>"><? echo $nome_cliente; ?></td>
<td>&nbsp;<? echo "R$ "; printf("%01.2f", $valor_ativ); ?></td>
<td>&nbsp;<? echo "R$ "; printf("%01.2f", $valor_mens); ?></td>
<td>&nbsp;<? echo converte_data($data_solic); ?></td>
<td>&nbsp;<? 
if($data_ativ == "0000-00-00"){
echo "<font color=\"red\">pendente</font>";
}else{
echo converte_data($data_ativ); 
}?></td>
<td>&nbsp;<?
if($data_cobr == "0000-00-00"){
echo "<font color=\"red\">pendente</font>";
}else{
echo converte_data($data_cobr); 
}
?></td>
<td>&nbsp;<? 
if($data_1mens == "0000-00-00"){
echo "<font color=\"red\">pendente</font>";
}else{
echo converte_data($data_1mens);
}

?></td>
<td>&nbsp;<? echo $status; ?></td>
<td>&nbsp;<?
if($comissao == 1){
echo "<font color=red><b>Pago</b></font>";
} else {
echo "<font color=pink><b>Não pago</b></font>";
}
?></td>
</tr>
<?
}
?>
</BODY>
</HTML>
