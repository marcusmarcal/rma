<html>
<head>
 <title>Responder RMA</title>
</head>
<body>
<?
require "padrao.php";
$sql = "select * from rma where id = '$id'";
$resultado = mysql_query($sql) or die(mysql_error());

$linha = mysql_fetch_array($resultado);
$id = $linha['id'];
$data_entrada = $linha['data_entrada'];
$nomecli = $linha['nome'];
$contato = $linha['contato'];
$telefone = $linha['telefone'];
$br = $linha['br'];
$nf_remessa = $linha['nf_remessa'];
$laudo = $linha['laudo'];
$modelo = $linha['modelo'];
$nf_venda = $linha['nf_venda'];
$data_nf_venda = $linha['data_nf_venda'];
$conector = $linha['conector'];
$fonte = $linha['fonte'];
$poe = $linha['poe'];
$pigtail = $linha['pigtail'];
$ferragens = $linha['ferragens'];
$outros = $linha['outros'];
$serie = $linha['serie'];
$mac = $linha['mac'];
$defeito = $linha['defeito'];
$data_diag = $linha['data_diag'];
$fornecedor = $linha['fornecedor'];
$garantia = $linha['garantia'];
$conserto = $linha['conserto'];
$tecnico_cons = $linha['tecnico_cons'];
$data_cons = $linha['data_cons'];
$orcamento = $linha['orcamento'];
$cond_pagto = $linha['cond_pagto'];
$aprovado = $linha['aprovado'];
$data_aprov = $linha['data_aprov'];
$despacho = $linha['despacho'];
$data_saida = $linha['data_saida'];
$transportadora = $linha['transportadora'];
$tecnico = $linha['tecnico'];
$responsavel = $linha['responsavel'];
$status = $linha['status'];
$status2 = $linha['status2'];

switch ($status) {
   case "fim":
	$status = "Finalizado";
       break;
   case "pend_adm":
	$status = "Administrativo";
       break;
   case "pend_tec":
	$status = "Técnica";
       break;
   case "cancelado":
	$status = "Cancelado";
       break;
}
switch ($status2) {
   case 0:
       $fase = "<font color=\"red\"><b>Diagnóstico";
       break;
   case 1:
       $fase = "<font color=\"black\"><b>Orçamento";
       break;
   case 2:
       $fase = "<font color=\"blue\"><b>Aprovação";
       break;
   case 3:
       $fase = "<font color=\"orange\"><b>Conserto";
       break;
   case 4:
       $fase = "<font color=\"purple\"><b>Despacho";
       break;
   case 5:
       $fase = "<font color=\"grey\"><b>Fornecedor";
       break;
   case 7:
       $fase = "<font color=\"green\"><b>Fim";
       break;
}

?>


<table border="1" cellpadding="0" cellspacing="2" align="center" width="60%">
       <tr>
           <td colspan="2" align="center" border="0">&nbsp;<font size="6">RMA Nº&nbsp;<? echo $id; ?>
           <? if($status2 != 7) { ?>
           <form action="visual.php" method="get">
                 <input type="submit" name="submit" value="Editar">
                 <input type="hidden" name="id" value="<? echo $id; ?>">
           </form>
           <? } ?>
</td>
       </tr>
       <tr>
           <th width="20%">Setor</th>
           <td width="80%">&nbsp;<font size="3"><? echo $status; ?></td>
       </tr>
       <tr>
           <th >Data Entrada</th>
           <td>&nbsp;<? echo converte_data($data_entrada); ?></td>
       </tr>
       <tr>
           <th >Fase</th>
           <td>&nbsp;<font size="3"><? echo $fase; ?></font></font></td>
       </tr>
       <tr>
           <th >Modelo</th>
           <td>&nbsp;<? echo $modelo; ?></td>
       </tr>
<? if($serie != "") { ?>
       <tr>
           <th>Nº Série</th>
           <td>&nbsp;<? echo $serie; ?></td>
       </tr>
<? } if($mac != "") { ?>
       <tr>
           <th>MAC Address</th>
           <td>&nbsp;<? echo $mac; ?></td>
       </tr>
<? } ?>
       <tr>
           <th>BR</th>
           <td>&nbsp;<a target="_new" href="http://intranet.computech.com.br/administrativo/br/visual.php?numero_br=<? echo $br; ?>"><? echo $br; ?></a></td>
       </tr>
       <tr>
           <th>NF Venda</th>
           <td>&nbsp;<? echo $nf_venda; ?></td>
       </tr>
       <tr>
           <th>Data NF Venda</th>
           <td>&nbsp;<? echo converte_data($data_nf_venda); ?></td>
       </tr>
       <tr>
           <th>Garantia</th>
           <td>&nbsp;<? echo $garantia; ?></td>
       </tr>
       <tr>
           <th>NF Remessa</th>
           <td>&nbsp;<? echo $nf_remessa; ?></td>
       </tr>
       <tr>
           <th>Laudo do Cliente</th>
           <td><pre><? echo $laudo; ?></pre></td>
       </tr>
       <tr>
           <th >Nome do Cliente</th>
           <td>&nbsp;<? echo $nomecli; ?></td>
       </tr>
       <tr>
           <th>Telefone</th>
           <td>&nbsp;<? echo $telefone; ?></td>
       </tr>
       <tr>
           <th>Contato</th>
           <td>&nbsp;<? echo $contato; ?></td>
       </tr>
       <tr>
           <th>Acessórios</th>
           <td>
           &nbsp;Conector:&nbsp;<? echo $conector; ?><br>
           &nbsp;Fonte:&nbsp;<? echo $fonte; ?><br>
           &nbsp;PoE:&nbsp;<? echo $poe; ?><br>
           &nbsp;Pigtail:&nbsp;<? echo $pigtail; ?><br>
           &nbsp;Ferragens:&nbsp;<? echo $ferragens; ?><br>
           </td>
       </tr>
       <tr>
           <th >Observações</th>
           <td><pre><? echo $outros; ?></pre></td>
       </tr>
       <tr>
           <th>Responsável</th>
           <td>&nbsp;<? echo $responsavel; ?></td>
       </tr>
<form action="editar_resp.php" method="get">
<input type="hidden" name="set_id" value="<? echo $id; ?>">
<input type="hidden" name="set_tecnico" value="<? echo $nome; ?>">
<?
if ($status2 == 0){
?>
</table>
<hr>
<table border="1" cellpadding="0" cellspacing="0" align="center" width="60%">
<? if($serie == "") { ?>
       <tr>
           <th>Nº Série</th>
           <td><input type="text" name="set_serie">&nbsp;&nbsp;<font color="red"><b>Nº de Série não cadastrado. Por favor, cadastrar.</b></font></td>
       </tr>
<? } else { ?>
       <tr>
           <th>Nº Série</th>
           <td>&nbsp;<? echo $serie; ?></td>
       </tr>
       <input type="hidden" name="set_serie" value="<? echo $serie; ?>">
<? } if($mac == "") { ?>
       <tr>
           <th>MAC Address</th>
           <td><input type="text" name="set_mac">&nbsp;&nbsp;<font color="red"><b>MAC Address não cadastrado. Por favor, cadastrar.</b></font></td>
       </tr>
<? } else { ?>
       <tr>
           <th>MAC Address</th>
           <td>&nbsp;<? echo $mac; ?></td>
       </tr>
       <input type="hidden" name="set_mac" value="<? echo $mac; ?>">
<? } ?>
       <tr>
           <th>Defeito Constatato</th>
           <td><textarea name="set_defeito" rows="5" cols="40"><? echo $defeito; ?></textarea></td>
       </tr>
       <tr>
           <th>Despachar Fornecedor</th>
           <td><input type="radio" name="set_envio_fornecedor" value="Sim">&nbsp;SIM<br><input type="radio" name="set_envio_fornecedor" value="Não">&nbsp;NÃO</td>
       </tr>
       <input type="hidden" name="set_status2" value="0">
<? } elseif ($status2 == 1){ ?>
       <tr>
           <th>Técnico Responsável</th>
           <td>&nbsp;<? echo $tecnico; ?></td>
       </tr>
       <tr>
           <th>Defeito Constatato</th>
           <td><pre><? echo $defeito; ?></pre></td>
       </tr>
</table>
<hr>
<table border="1" cellpadding="0" cellspacing="0" align="center" width="60%">
       <tr>
           <th>Valor Orçamento</th>
           <td><input type="text" name="set_orcamento" value="0.00">&nbsp; Atenção: Utilize ponto ".", nunca vírgula ","</td>
       </tr>
       <input type="hidden" name="set_status2" value="1">
<? } elseif ($status2 == 5){ ?>
</table>
<hr>
<table border="1" cellpadding="0" cellspacing="0" align="center" width="60%">
       <tr>
           <th>Técnico Responsável</th>
           <td>&nbsp;<? echo $tecnico; ?></td>
       </tr>
       <tr>
           <th>Defeito Constatato<br>+<br>Diagnóstico do Fornecedor</th>
           <td><textarea name="set_defeito" rows="5" cols="40"><? echo $defeito; ?></textarea>* Atenção! Manter histórico</td>
       </tr>
       <tr>
           <th>Valor Orçamento</th>
           <td><input type="text" name="set_orcamento" value="0.00">&nbsp; Atenção: Utilize ponto ".", nunca vírgula ","</td>
       </tr>
       <input type="hidden" name="set_status2" value="5">
<? } elseif ($status2 == 2){ ?>
       <tr>
           <th>Técnico Responsável</th>
           <td>&nbsp;<? echo $tecnico; ?></td>
       </tr>
       <tr>
           <th>Defeito Constatato</th>
           <td><pre><? echo $defeito; ?></pre></td>
       </tr>
       <tr>
           <th>Valor Orçamento</th>
           <td>&nbsp;<? echo "R$ "; printf("%01.2f", $orcamento); ?></td>
       </tr>
</table>
<hr>
<table border="1" cellpadding="0" cellspacing="0" align="center" width="60%">
       <tr>
           <th>Aprovado</th>
           <td><input type="radio" name="set_aprovado" value="Sim">&nbsp;SIM<br><input type="radio" name="set_aprovado" value="Não">&nbsp;NÃO</td>
       </tr>
       <tr>
           <th>Transportadora</th>
           <td><input type="text" size="50" name="set_transportadora"></td>
       </tr>
       <tr>
           <th>Condições de Pagamento</th>
           <td><input type="text" size="50" name="set_cond_pagto"></td>
       </tr>
       <input type="hidden" name="set_status2" value="2">
<? } elseif ($status2 == 3){ ?>
       <tr>
           <th>Técnico Responsável</th>
           <td>&nbsp;<? echo $tecnico; ?></td>
       </tr>
       <tr>
           <th>Defeito Constatato</th>
           <td><pre><? echo $defeito; ?></pre></td>
       </tr>
       <tr>
           <th>Valor Orçamento</th>
           <td>&nbsp;<? echo "R$ "; printf("%01.2f", $orcamento); ?></td>
       </tr>
       <tr>
           <th>Aprovado</th>
           <td>&nbsp;<? echo $aprovado; ?></td>
       </tr>
       <tr>
           <th>Transportadora</th>
           <td>&nbsp;<? echo $transportadora; ?></td>
       </tr>
       <tr>
           <th>Condições de Pagamento</th>
           <td>&nbsp;<? echo $cond_pagto; ?></td>
       </tr>
</table>
<hr>
<table border="1" cellpadding="0" cellspacing="0" align="center" width="60%">
       <tr>
           <th>Conserto Realizado</th>
           <td><textarea name="set_conserto" rows="5" cols="40"></textarea></td>
       </tr>
       <input type="hidden" name="set_status2" value="3">
<? } elseif ($status2 == 4){ ?>
       <tr>
           <th>Técnico Responsável</th>
           <td>&nbsp;<? echo $tecnico; ?></td>
       </tr>
       <tr>
           <th>Defeito Constatato</th>
           <td><pre><? echo $defeito; ?></pre></td>
       </tr>
       <tr>
           <th>Valor Orçamento</th>
           <td>&nbsp;<? echo "R$ "; printf("%01.2f", $orcamento); ?></td>
       </tr>
       <tr>
           <th>Aprovado</th>
           <td>&nbsp;<? echo $aprovado; ?></td>
       </tr>
       <tr>
           <th>Transportadora</th>
           <td>&nbsp;<? echo $transportadora; ?></td>
       </tr>
       <tr>
           <th>Condições de Pagamento</th>
           <td>&nbsp;<? echo $cond_pagto; ?></td>
       </tr>
       <tr>
           <th>Conserto Realizado</th>
           <td><pre><? echo $conserto; ?></pre></td>
       </tr>
       <tr>
           <th>Técnico Responsável Conserto</th>
           <td>&nbsp;<? echo $tecnico_cons; ?></td>
       </tr>
</table>
<hr>
<table border="1" cellpadding="0" cellspacing="0" align="center" width="60%">
       <tr>
           <th>Despachado</th>
           <td><input type="radio" name="set_despacho" value="Sim">&nbsp;SIM<br><input type="radio" name="set_despacho" value="Não">&nbsp;NÃO</td>
       </tr>
       <input type="hidden" name="set_status2" value="4">
<? }
if($status2 != 7){ ?>

       <tr>
           <td colspan="2" align="center"><input type="submit" name="submit" value="Responder"></td>
       </tr>
<? } else { ?>
       <tr>
           <th>Técnico Responsável</th>
           <td>&nbsp;<? echo $tecnico; ?></td>
       </tr>
       <tr>
           <th>Defeito Constatato</th>
           <td><pre><? echo $defeito; ?></pre></td>
       </tr>
       <tr>
           <th>Valor Orçamento</th>
           <td>&nbsp;<? echo "R$ "; printf("%01.2f", $orcamento); ?></td>
       </tr>
       <tr>
           <th>Aprovado</th>
           <td>&nbsp;<? echo $aprovado; ?></td>
       </tr>
       <tr>
           <th>Transportadora</th>
           <td>&nbsp;<? echo $transportadora; ?></td>
       </tr>
       <tr>
           <th>Condições de Pagamento</th>
           <td>&nbsp;<? echo $cond_pagto; ?></td>
       </tr>
       <tr>
           <th>Conserto Realizado</th>
           <td><pre><? echo $conserto; ?></pre></td>
       </tr>
       <tr>
           <th>Técnico Responsável Conserto</th>
           <td>&nbsp;<? echo $tecnico_cons; ?></td>
       </tr>
       <tr>
           <th>Despachado</th>
           <td>&nbsp;<? echo $despacho; ?></td>
       </tr>
       <tr>
           <th >Data Saída</th>
           <td>&nbsp;<? echo converte_data($data_saida); ?></td>
       </tr>
<? } ?>
</form>
</table>
</body>
</html>
