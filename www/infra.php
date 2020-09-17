<?
require("padrao.php");
if(!isset($atualm) OR ($atualy)){
$atualm = date('m');
$atualy = date('Y');
}
$sql = "select * from ativacoes where status like 'pend_infra' order by data_solic desc";
$resultado = mysql_query($sql) or die(mysql_error());
?>
<h3 align=center><font color=green>Controle da Infra</h3>
<?
?>
<hr>
<table border="1" cellpadding="0" cellspacing="0" align="center" width="100%">
<tr>
<th><a href="?ordem=vendedor"><? if($ordem == vendedor){ ?><font color=red><? } ?>Comercial</a></th>
<th><a href="?ordem=condominio"><? if($ordem == condominio){ ?><font color=red><? } ?>Condomínio</th>
<th><a href="?ordem=nome_cliente"><? if($ordem == nome_cliente){ ?><font color=red><? } ?>Nome Cliente</th>
<th><a href="?ordem=data_solic"><? if($ordem == data_solic){ ?><font color=red><? } ?>Data Solicitação</th>
<th><a href="?ordem=data_infra"><? if($ordem == status){ ?><font color=red><? } ?>Data Infra</th>
<th><a href="?ordem=data_infra"><? if($ordem == status){ ?><font color=red><? }
?>Dias até hoje</th>
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
$data_infra = $linha['data_infra'];
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
<td>&nbsp;<? echo $vendedor; ?></td>
<td>&nbsp;<? echo $condominio; ?></td>
<td>&nbsp;<a href="visual.php?id=<? echo $id; ?>"><? echo $nome_cliente; ?></td>
<? //<td>&nbsp;<? echo $plano; ?></td>
<td>&nbsp;<? echo converte_data($data_solic); ?></td>
<td>&nbsp;<? echo converte_data($data_infra); ?></td>
<td>&nbsp;<? echo "<font color=red><b>" . tempo($data_infra,"00:00:00",$data_agora,"00:00:00"); ?></td>
</tr>
<?
}
?>
</BODY>
</HTML>
