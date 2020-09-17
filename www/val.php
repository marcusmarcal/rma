<?
require("padrao.php");
if(!isset($atualm) OR ($atualy)){
$atualm = date('m');
$atualy = date('Y');
}
$sql = "select * from ativacoes where vendedor = 'Valderez Ferreira' and
status = 'pend_ass' or vendedor = 'Valderez Ferreira' and status = 'ok' order by data_ativ desc";
$resultado = mysql_query($sql) or die(mysql_error());
?>
<h2 align="center"><font color="red">CONTROLE VAL</h2>
<hr>
<table border="1" cellpadding="0" cellspacing="0" align="center" width="100%">
<tr>
<th><a href="?ordem=data_ativ"><? if($ordem == data_ativ){ ?><font color=red><? } ?>Data
Ativação</th>
<th><a href="?ordem=condominio"><? if($ordem == condominio){ ?><font color=red><? } ?>Condomínio</th>
<th><a href="?ordem=nome_cliente"><? if($ordem == nome_cliente){ ?><font color=red><? } ?>Nome Cliente</th>
<th><a href="?ordem=valor_ativ"><? if($ordem == valor_ativ){ ?><font color=red><? } ?>Valor
Ativação</th>
<th><a href="?ordem=valor_mens"><? if($ordem == valor_mens){ ?><font color=red><? }
?>Valor Mensal</th>
<th><a href="?ordem=data_solic"><? if($ordem == data_solic){ ?><font color=red><? } ?>Data Solicitação</th>
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
<td>&nbsp;<? 
if($data_ativ == "0000-00-00"){
echo "<font color=\"red\">pendente</font>";
}else{
echo converte_data($data_ativ); 
}?></td>
<td>&nbsp;<? echo $condominio; ?></td>
<td>&nbsp;<? echo $nome_cliente; ?></td>
<td>&nbsp;<? echo "R$ "; printf("%01.2f", $valor_ativ); ?></td>
<td>&nbsp;<? echo "R$ "; printf("%01.2f", $valor_mens); ?></td>
<td>&nbsp;<? echo converte_data($data_solic); ?></td>
</tr>
<?
}
?>
</BODY>
</HTML>
