<html>
<head>
 <title>Editar RMA</title>
</head>
<body>
<?
require "padrao.php";
if(!isset($submit_editar)){
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

<form action="visual.php" method="post">
<input type="hidden" name="set_id" value="<? echo $id; ?>">
<table border="1" cellpadding="0" cellspacing="2" align="center" width="60%">
       <tr>
           <td colspan="2" align="center" border="0">&nbsp;<font size="6">Editando RMA Nº&nbsp;<? echo $id; ?></td>
       </tr>
       <tr>
           <th >Modelo</th>
           <td><input type="text" name="set_modelo" size="40" value="<? echo $modelo; ?>"></td>
       </tr>
       <tr>
           <th>&nbsp;Acessórios:</th>
           <td>
               &nbsp;&nbsp;&nbsp;Conector:<input type="checkbox" name="set_conector" value="sim" <? if($conector == "sim") echo "checked";?> /><br>
               &nbsp;&nbsp;&nbsp;Fonte:<input type="checkbox" name="set_fonte" value="sim" <? if($fonte == "sim") echo "checked";?>/><br>
               &nbsp;&nbsp;&nbsp;PoE:<input type="checkbox" name="set_poe" value="sim" <? if($poe == "sim") echo "checked";?>/><br>
               &nbsp;&nbsp;&nbsp;Pigtail:<input type="checkbox" name="set_pigtail" value="sim" <? if($pigtail == "sim") echo "checked";?>/><br>
               &nbsp;&nbsp;&nbsp;Ferragens:<input type="checkbox" name="set_ferragens" value="sim" <? if($ferragens == "sim") echo "checked";?>/><br>
           </td>
       </tr>
       <tr>
           <th>BR</th>
           <td><input type="text" name="set_br" value="<? echo $br; ?>"></a></td>
       </tr>
       <tr>
           <th>NF Venda</th>
           <td><input type="text" name="set_nf_venda" value="<? echo $nf_venda; ?>"></td>
       </tr>
       <tr>
           <th>Data NF Venda</th>
           <td><input type="text" name="set_data_nf_venda" value="<? echo converte_data($data_nf_venda); ?>">&nbsp;Garantia:<input type="checkbox" name="set_garantia" value="sim" <? if($garantia == "sim") echo "checked";?> /></td>
       </tr>
       <tr>
           <th>NF Remessa</th>
           <td><input type="text" name="set_nf_remessa" value="<? echo $nf_remessa; ?>"></td>
       </tr>
       <tr>
           <th>Nome do Cliente</th>
           <td><input type="text" size="60" name="set_nome" value="<? echo $nomecli; ?>"></td>
       </tr>
       <tr>
           <th>Telefone</th>
           <td><input type="text" name="set_telefone" value="<? echo $telefone; ?>"></td>
       </tr>
       <tr>
           <th>Contato</th>
           <td><input type="text" name="set_contato" value="<? echo $contato; ?>"></td>
       </tr>
       <tr>
           <th >Observações</th>
           <td><textarea name="set_obs" rows="5" cols="40"><? echo $outros; ?></textarea>* Atenção! Manter histórico</td>
       </tr>
       <tr>
           <td colspan="2" align="center"><input type="submit" name="submit_editar" value="Salvar"></td>
       </tr>
<?
} else {

$set_data_nf_venda = converte_data($set_data_nf_venda);

$update = "update rma set
modelo=\"$set_modelo\",
br=\"$set_br\",
nf_venda=\"$set_nf_venda\",
data_nf_venda=\"$set_data_nf_venda\",
nf_remessa=\"$set_nf_remessa\",
nome=\"$set_nome\",
garantia=\"$set_garantia\",
telefone=\"$set_telefone\",
contato=\"$set_contato\",
conector=\"$set_conector\",
fonte=\"$set_fonte\",
poe=\"$set_poe\",
pigtail=\"$set_pigtail\",
ferragens=\"$set_ferragens\",
outros=\"$set_obs\"
where id=\"$set_id\"";

$result = mysql_query($update) or die (mysql_error());
echo "Alterado com Exito!<br>";

/*mail(
"rma@computech.com.br",
"marcus.computech@gmail.com",
"RMA $set_id Editado",
"
RMA $set_id editado por $nome;<br><br>

<a href=\"http://intranet.computech.com.br/rma/responder.php?id=$set_id\">Clique aqui</a>
",
"From: Sistema de RMA <rma@computech.com.br>\nContent-type: text/html\n") or die ("Não foi possível enviar o e-mail")
;
*/
?>
<meta http-equiv="Refresh" content="3; URL=index.php">
<? } ?>

