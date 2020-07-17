<?
require "padrao.php";

$set_data_aceite = converte_data($set_data_aceite);
$set_data_solic = converte_data($set_data_solic);

$add = "insert into ativacoes set
vendedor=\"$set_vendedor\",
nome_cliente=\"$set_nome_cliente\",
endereco=\"$set_endereco\",
condominio=\"$set_condominio\",
plano=\"$set_plano\",
valor_ativ=\"$set_valor_ativ\",
valor_mens=\"$set_valor_mens\",
status=\"pend_tec\",
data_solic=\"$set_data_solic\",
obs=\"$set_obs\"";

$insert = mysql_query($add) or die(mysql_error());
echo "Adicionado com êxito!";
?>
<meta http-equiv="Refresh" content="0; URL=index.php">
