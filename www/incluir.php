<?
$add = "INSERT INTO ativacoes
(
'vendedor',
'nome_cliente',
'endereco',
'condominio',
'plano',
'valor_ativ',
'valor_mens',
'status',
'data_aceite',
'data_solic',
'data_ativ',
'data_cobr',
'data_1mens'
) VALUES (
'$vendedor',
'$nome_cliente',
'$endereco',
'$condominio',
'$plano',
'$valor_ativ',
'$valor_mens',
'$status',
'$data_aceite',
'$data_solic',
'$data_ativ',
'$data_cobr',
'$data_1mens')";
$inserir = mysql_query($add);
?>
