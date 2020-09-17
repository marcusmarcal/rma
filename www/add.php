<?
require "padrao.php";
$data_nf_venda = converte_data($data_nf_venda);
$hoje = date("Y-m-d");

$add = "insert into rma set
responsavel=\"$responsavel\",
nome=\"$nomecli\",
contato=\"$contato\",
telefone=\"$telefone\",
br=\"$br\",
nf_remessa=\"$nf_remessa\",
laudo=\"$laudo\",
modelo=\"$modelo\",
nf_venda=\"$nf_venda\",
data_nf_venda=\"$data_nf_venda\",
conector=\"$conector\",
fonte=\"$fonte\",
serie=\"$serie\",
garantia=\"$garantia\",
mac=\"$mac\",
poe=\"$poe\",
outros=\"$outros\",
pigtail=\"$pigtail\",
ferragens=\"$ferragens\",
status=\"pend_tec\",
data_entrada=\"$hoje\"";

$insert = mysql_query($add) or die(mysql_error());

$result = mysql_query("select id from rma") or die(mysql_error());
while($fetch = mysql_fetch_array($result)){;
$novo_id = $fetch['id'];
}
mail(
"rma@computech.com.br",
//"marcus.computech@gmail.com",
"Novo Equipamento RMA $novo_id",
"
RMA: $novo_id<br>
Modelo: $modelo<br>
Nome do Cliente: $nomecli <br>
Contato: $contato <br>
Telefones: $telefone <br>
Laudo do Cliente: $laudo <br>
Responsável: $responsavel <br>

<br>
Poste o diagnóstico: <a href=\"http://intranet.computech.com.br/rma/responder.php?id=$novo_id\">Clique Aqui</a><br>
",
"From: Sistema de RMA <rma@computech.com.br>\nContent-type: text/html\n") or die ("Não foi possível enviar o e-mail")
;
?>
<br>
<meta http-equiv="Refresh" content="3; URL=index.php">
<?
echo "Equipamento cadastrado com sucesso!";
?>
