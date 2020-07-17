<center><img src="http://www.computech.com.br/ctech_logo2.gif">
<h3>Rua São Manoel, 1197 - 6° andar - CEP 90620-110
Telefone (51) 3217-0900</h3>
<h2 align="center">Boletim de Fechamento de Plano de Acesso</h2>
<?
require "conexao.php";
$sql = "select * from ativacoes where id = '$id'";
$resultado = mysql_query($sql) or die(mysql_error());

$linha = mysql_fetch_array($resultado);
$id = $linha['id'];
$vendedor = $linha['vendedor'];
$nome_cliente = $linha['nome_cliente'];
$endereco = $linha['endereco'];
$bairro = $linha['bairro'];
$cep = $linha['cep'];
$vencimento = $linha['vencimento'];
$cpf_cnpj = $linha['cpf_cnpj'];
$rg_ie = $linha['rg_ie'];
$email = $linha['email'];
$condominio = $linha['condominio'];
$plano = $linha['plano'];
$valor_ativ = $linha['valor_ativ'];
$form_pag_ativ = $linha['form_pag_ativ'];
$valor_mens = $linha['valor_mens'];
$status = $linha['status'];
//$data_aceite = $linha['data_aceite'];
$data_solic = $linha['data_solic'];
$data_infra = $linha['data_infra'];
$data_ok_infra = $linha['data_ok_infra'];
$data_ativ = $linha['data_ativ'];
$data_ass = $linha['data_ass'];
$data_cobr = $linha['data_cobr'];
$data_1mens = $linha['data_1mens'];
$obs = $linha['obs'];
$velocidade = $linha['velocidade'];
$telefones = $linha['telefones'];
$placa_rede = $linha['placa_rede'];
$cidade = $linha['cidade'];
$user_ultim = $linha['user_ultim'];
$data_ultim = $linha['data_ultim'];

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

?>
<table border="1" cellpadding="0" cellspacing="0" align="center">
<tr>
<th>Condomínio</th>
<td>&nbsp;<? echo $condominio; ?></td>
</tr>
<tr>
<th>Nome do Cliente</th>
<td>&nbsp;<b><? echo $nome_cliente; ?></b></td>
</tr>
<tr>
<th>Contato</th>
<td>&nbsp;<b><? echo $contato; ?></b></td>
</tr>
<tr>
<th>Endereço</th>
<td>&nbsp;<? echo $endereco; ?></td>
</tr>
<tr>
<th>Cidade</th>
<td>&nbsp;<? echo $cidade; ?></td>
</tr>
<tr>
<th>Bairro</th>
<td>&nbsp;<? echo $bairro; ?></td>
</tr>
<tr>
<th>CEP</th>
<td>&nbsp;<? echo $cep; ?></td>
</tr>
<tr>
<th>CPF - CNPJ</th>
<td>&nbsp;<? echo $cpf_cnpj; ?></td>
</tr>
<tr>
<th>RG - IE</th>
<td>&nbsp;<? echo $rg_ie; ?></td>
</tr>

<tr>
<th>E-mail</th>
<td>&nbsp;<? echo $email; ?></td>
</tr>
<tr>
<th>Telefones</th>
<td>&nbsp;<? echo $telefones; ?></td>
</tr>
<tr>
<th>Plano</th>
<td>&nbsp;<? echo $plano; ?></td>
</tr>
<tr>
<th>Data Vencimento</th>
<td>&nbsp;<? echo $vencimento; ?></td>
</tr>
<tr>
<th>Valor Ativação</th>
<td>&nbsp;<? echo "R$ "; printf("%01.2f", $valor_ativ); ?></td>
</tr>
<tr>
<th>Forma de pagamento</th>
<td>&nbsp;<? echo $form_pag_ativ; ?></td>
</tr>
<tr>
<th>Velocidade Contratada</th>
<td>&nbsp;<? echo $velocidade; ?>&nbsp;Kbps</td>
</tr>
<tr>
<th>Valor Mensalidade</th>
<td>&nbsp;<? echo "R$ "; printf("%01.2f", $valor_mens); ?></td>
</tr>
<tr>
<th>Observações</th>
<td>&nbsp;<? echo $obs; ?></td>
</tr>

<tr>
<th colspan="2">Última edição: <? echo $user_ultim . " " . $data_ultim; ?></th>
</tr>

</table>
<center>
<form method="get" action="visual_editar.php">
<input type="hidden" name="id" value="<? echo $id; ?>">
<input type="submit" value="Editar" class="botao" name="botao">
</form>
</body>
</html>
