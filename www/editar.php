<?
require "padrao.php";
$datetime = date("Y-m-d H:i:s");
$set_data_resp = converte_data($set_data_resp);

$add = "update visadas set
endereco=\"$set_endereco\",
obs=\"$set_obs\",
obs_tec=\"$set_obs_tec\",
telefones=\"$set_telefones\",
data_ultim=\"$datetime\",
user_ultim=\"$REMOTE_USER\"
where id=\"$set_id\"";

$update = mysql_query($add) or die (mysql_error());
echo "Alterado com Exito!";
?>
<meta http-equiv="Refresh" content="0; URL=index.php">
