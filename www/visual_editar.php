<html>
<head>
 <title>Novo Documento</title>
</head>
<body>
<?
require "padrao.php";
$sql = "select * from visadas where id = '$id'";
$resultado = mysql_query($sql) or die(mysql_error());

$linha = mysql_fetch_array($resultado);
$id = $linha['id'];
$vendedor = $linha['vendedor'];
$nome_cliente = $linha['nome_cliente'];
$endereco = $linha['endereco'];
$andares = $linha['andares'];
$telefones = $linha['telefones'];
$status = $linha['status'];
$viabilidade = $linha['viabilidade'];
$data_solic = $linha['data_solic'];
$data_resp = $linha['data_resp'];
$obs = $linha['obs'];
$obs_tec = $linha['obs_tec'];

switch ($status) {
   case "fim":
	$status = "Finalizado";
       break;
   case "pend_com":
        $status = "Pendente Comercial";
       break;
   case "pend_tec":
         $status = "Pendente Técnica";
       break;
   case "cancelado":
         $status = "Cancelado";
       break;
}
switch ($viabilidade) {
   case "sim":
       $select_sim = "selected";
       break;
   case "nao":
       $select_nao = "selected";
       break;
}
?>
<form action="editar.php" method="get">
<input type="hidden" name="set_id" value="<? echo $id; ?>">
<table border="1" cellpadding="0" cellspacing="0" align="center">
<tr>
<th width="40%">Vendedor</th>
<td><b><? echo $vendedor; ?></b></td>
</tr>
<tr>
<th>Nome do Cliente</th>
<td><? echo $nome_cliente; ?></td>
</tr>
<tr>
<th>Endereço</th>
<td><input type="text" size="60" name="set_endereco" value="<? echo $endereco; ?>"></td>
</tr>
<tr>
<th>Andares</th>
<td><input type="text" size="2" name="set_andares" value="<? echo $andares; ?>"></td>
</tr>
<tr>
<th>Telefones</th>
<td><input type="text" size="30" name="set_telefones" value="<? echo $telefones; ?>"></td>
</tr>
<tr>
<th>Status</th>
<td>&nbsp;<font color="red"><? echo $status; ?></td>
</tr>
<tr>
<th>Data Solicitação</th>
<td><? echo converte_data($data_solic); ?></td>
</tr>

<tr>
<th>Observações Comerciais</th>
<td>
<textarea name="set_obs" rows="5" cols="40"><? echo $obs; ?></textarea>
</td>
</tr>
<tr>
<th>Observações Técnicas</th>
<td>
<textarea name="set_obs_tec" rows="5" cols="40"><? echo $obs_tec; ?></textarea>
</td>
</tr>
<tr>
<td colspan="2" aling="center">
<input type="submit" name="submit" value="Salvar!">
</td>
</tr>

</body>
</html>
