<?
require "padrao.php";
$datetime = date("Y-m-d H:i:s");
$hoje = date("Y-m-d");


if($set_status2 == 0){

if($set_envio_fornecedor != "Sim"){
$update = "update rma set
status=\"pend_adm\",
data_diag=\"$hoje\",
defeito=\"$set_defeito\",
serie=\"$set_serie\",
mac=\"$set_mac\",
tecnico=\"$set_tecnico\",
status2=\"1\"
where id=\"$set_id\"";
$novo = 1;

} else {
$update = "update rma set
status=\"pend_adm\",
defeito=\"$set_defeito\",
tecnico=\"$set_tecnico\",
serie=\"$set_serie\",
mac=\"$set_mac\",
status2=\"5\"
where id=\"$set_id\"";
$novo = 5;
} }

elseif($set_status2 == 1){
$update = "update rma set orcamento=\"$set_orcamento\", status=\"pend_adm\", status2=\"2\" where id=\"$set_id\"";
$novo = 2;
}
elseif($set_status2 == 2){
if($set_aprovado == "Sim"){
$update = "update rma set
status=\"pend_tec\",
aprovado=\"$set_aprovado\",
data_aprov=\"$hoje\",
transportadora=\"$set_transportadora\",
cond_pagto=\"$set_cond_pagto\",
status2=\"3\"
where id=\"$set_id\"";
$novo = 3;
} else {
$update = "update rma set
status=\"pend_adm\",
aprovado=\"$set_aprovado\",
transportadora=\"$set_transportadora\",
status2=\"4\"
where id=\"$set_id\"";
$novo = 4;
}
}

elseif($set_status2 == 3){
$update = "update rma set
status=\"pend_adm\",
conserto=\"$set_conserto\",
tecnico_cons=\"$nome\",
data_cons=\"$hoje\",
tecnico_cons=\"$set_tecnico\",
status2=\"4\"
where id=\"$set_id\"";
$novo = 4;
}
elseif($set_status2 == 4){
if($set_despacho == "Sim"){
$update = "update rma set
status=\"fim\",
despacho=\"$set_despacho\",
data_saida=\"$hoje\",
status2=\"7\"
where id=\"$set_id\"";
$novo = 7;
} else {
echo "Nada a ser feito.<br><meta http-equiv=\"Refresh\" content=\"0; URL=index.php\">";
die;
}
}
if($set_status2 == 5){
$update = "update rma set orcamento=\"$set_orcamento\", defeito=\"$set_defeito\", tecnico=\"Fornecedor\", status=\"pend_adm\", status2=\"2\" where id=\"$set_id\"";
$novo = 2;
}

$result = mysql_query($update) or die (mysql_error());
echo "Alterado com Exito!<br>";
//echo $update;

switch ($novo) {
   case 1:
       $fase = "<font color=\"black\"><b>Orçamento</b></font>";
       break;
   case 2:
       $fase = "<font color=\"blue\"><b>Aprovação</b></font>";
       break;
   case 3:
       $fase = "<font color=\"orange\"><b>Conserto</b></font>";
       break;
   case 4:
       $fase = "<font color=\"purple\"><b>Despacho</b></font>";
       break;
   case 5:
       $fase = "<font color=\"grey\"><b>Fornecedor</b></font>";
       break;
   case 7:
       $fase = "<font color=\"green\"><b>Fim</b></font>";
       break;
}



mail(
"rma@computech.com.br",
//"marcus.computech@gmail.com",
"RMA $set_id Atualizado",
"
RMA $set_id atualizado.<br>
Nova fase: $fase <br>
Responsável pela última alteração: $nome;<br><br>

<a href=\"http://intranet.computech.com.br/rma/responder.php?id=$set_id\">Clique aqui</a>
",
"From: Sistema de RMA <rma@computech.com.br>\nContent-type: text/html\n") or die ("Não foi possível enviar o e-mail")
;

?>

<meta http-equiv="Refresh" content="1; URL=index.php">
