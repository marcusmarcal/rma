<?
require("padrao.php");
if(!isset($atualm) OR ($atualy)){
$atualm = date('m');
$atualy = date('Y');
}
$hoje = date('Y-m-d');

//where status=\"$status_search\" order by id desc

if(isset($ordem)){
$sql = "select * from rma where status='pend_tec' or status='pend_adm' order by $ordem desc";
} elseif(isset($status_search)){
$sql = "select * from rma where status like '$status_search' order by data_entrada desc";
} else {
$sql = "select * from rma where status='pend_tec' or status='pend_adm' order by data_entrada desc,id desc";
}

$resultado = mysql_query($sql) or die(mysql_error());
?>
<table border="0" align="center" width="65%" cellpadding="1" cellspacing="0">
<tr>
<td align="center"><a href="new.php"><font color="red">Novo Equipamento para Conserto</font></a></td>
<td align="center">
<form method="get" action="" >
<select name="status_search">
<option value="%%">Todos</option>
<option value="fim">Finalizado</option>
<option value="pend_tec">Pendente Técnica</option>
<option value="pend_adm">Pendente Administrativo</option>
<!--<option value="cancelado">Cancelados</option>-->
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
<table border="1" cellpadding="0" cellspacing="5" align="center" width="100%">
<tr>
<th></th>
<th><a href="?ordem=id"><? if($ordem == id){ ?><font color=red><? } ?>RMA</th>
<th><a href="?ordem=modelo"><? if($ordem == modelo){ ?><font color=red><? } ?>Modelo</th>
<th><a href="?ordem=status"><? if($ordem == status){ ?><font color=red><? } ?>Setor</th>
<th><a href="?ordem=status2"><? if($ordem == status2){ ?><font color=red><? } ?>Pendência</th>
<th><a href="?ordem=nome"><? if($ordem == nome){ ?><font color=red><? } ?>Nome Cliente</a></th>
<th><a href="?ordem=data_entrada"><? if($ordem == data_entrada){ ?><font color=red><? } ?>Data Entrada</th>
<th>Tempo de Espera</th>
</tr>
<?
$num = 1;
while($linha = mysql_fetch_array($resultado)){
$id = $linha['id'];
$data_entrada = $linha['data_entrada'];
$nome = $linha['nome'];
//$contato = $linha['contato'];
//$telefone = $linha['telefone'];
//$br = $linha['br'];
//$nf_remessa = $linha['nf_remessa'];
//$laudo = $linha['laudo'];
$modelo = $linha['modelo'];
//$nf_venda = $linha['nf_venda'];
//$data_nf_venda = $linha['data_nf_venda'];
//$conector = $linha['conector'];
//$fonte = $linha['fonte'];
//$poe = $linha['poe'];
//$pigtail = $linha['pigtail'];
//$ferragens = $linha['ferragens'];
//$outros = $linha['outros'];
//$serie = $linha['serie'];
//$mac = $linha['mac'];
//$defeito = $linha['defeito'];
//$data_diag = $linha['data_diag'];
$garantia = $linha['garantia'];
//$conserto = $linha['conserto'];
$orcamento = $linha['orcamento'];
//$cond_pagto = $linha['cond_pagto'];
//$aprovado = $linha['aprovado'];
$data_saida = $linha['data_saida'];
//$transportadora = $linha['transportadora'];
//$tecnico = $linha['tecnico'];
//$responsavel = $linha['responsavel'];
$status = $linha['status'];
$status2 = $linha['status2'];




switch ($status) {
   case "fim":
       $status = "<font color=\"black\"><b>Finalizado";
       break;
   case "pend_tec":
       $status = "<font color=\"red\"><b>Técnica";
       break;
   case "pend_adm":
       $status = "<font color=\"green\"><b>Admin.";
       break;
   case "cancelado":
       $status = "<font color=\"orange\"><b>Cancelado";
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

switch ($garantia) {
   case "sim":
       $garantia = "Sim";
       $gcolor = "red";
       break;
   case "não":
       $garantia = "Não";
       $gcolor = "";
       break;
}
switch ($garantia) {
   case "sim":
       $garantia = "Sim";
       $gcolor = "red";
       break;
   case "não":
       $garantia = "Não";
       $gcolor = "";
       break;
}

?>
       <tr>
           <td align="center"><? echo $num; ?></td>
           <td align="center">&nbsp;&nbsp;<a href="responder.php?id=<? echo $id; ?>"><font size="3"><? echo $id; ?></font></a>&nbsp;&nbsp;</td>
           <td>&nbsp;<? echo $modelo; ?></td>
           <td align="center">&nbsp;<? echo $status; ?></td>
           <td align="center">&nbsp;<? echo $fase; ?></td>
           <td>&nbsp;<? echo $nome; ?></td>
           <td align="center">&nbsp;<? echo converte_data($data_entrada); ?></td>
           <td align="center">&nbsp;
                        <?
                          if($status2 == 7) {
                          $espera = tempo($data_entrada,"00:00:00","$data_saida","00:00:00");
                          echo $espera;
                          if($espera <= 1){ echo "&nbsp;dia"; } else { echo "&nbsp;dias";}

                          } else {

                          $espera = tempo($data_entrada,"00:00:00","$hoje","00:00:00");
                          if($espera < 14){
                          echo "<font color=\"green\"><b>".$espera;
                          } elseif($espera < 21){
                          echo "<font color=\"orange\"><b>".$espera;
                          } elseif($espera < 28){
                          echo "<font color=\"red\"><b>".$espera;
                          } elseif($espera >= 28){
                          echo "<font color=\"fuisca\"><b>".$espera;
                          }

                          if($espera <= 1){ echo "&nbsp;dia"; } else { echo "&nbsp;dias";}
                          }
                        ?>
           </td>
       </tr>
<?
$num++;
}
?>
</BODY>
</HTML>
