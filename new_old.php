<HTML>
<HEAD>
 <TITLE>Cadastrar Novo Cliente</TITLE>
</HEAD>
<BODY>
<form action="add.php" method="get">
<table border="1" cellpadding="0" cellspacing="0" align="center" width="60%">
<tr>
<th>Vendedor</th>
<td>
<select name="set_vendedor">
<option value="val">Valderez</option>
<option value="marcello">Marcello</option>
<option value="bl">Banda Larga</option>
<option value="lu">Luciano</option>
</td>
</tr>
<tr>
<th>Condomínio</th>
<td><input type="text" name="set_condominio" size="30"></td>
</tr>
<tr>
<th>Nome do Cliente</th>
<td><input type="text" name="set_nome_cliente" size="60"></td>
</tr>
<tr>
<th>Endereço</th>
<td><input type="text" name="set_endereco" size="60"></td>
</tr>
<tr>
<th>Plano</th>
<td>
<select name="set_plano">
        <option value="home">Computech Home</option>
        <option value="home_ip">Computech Home + IP Válido</option>
        <option value="business">Computech Business</option>
        <option value="business_ip">Computech Business + IP Válido</option>
	<option value="light">Computech Light</option>
        <option value="access">Computech Access</option>
        <option value="server">Computech Server</option>
</select>
</td>
</tr>

<tr>
<th>Valor Ativação</th>
<td><input type="text" name="set_valor_ativ"></td>
</tr>

<tr>
<th>Valor Mensalidade</th>
<td><input type="text" name="set_valor_mens"></td>
</tr>
<!--
<tr>
<th>Data Aceite</th>
<td><input type="text" name="set_data_aceite"></td>
</tr>
-->
<tr>
<th>Data Solicitação</th>
<td><input type="text" name="set_data_solic"></td>
</tr>

<tr>
<th>Observações</th>
<td>
<textarea name="set_obs" rows="5" cols="40"></textarea>
</td>
</tr>
<tr>
<td colspan="2" aling="center">
<input type="submit" name="submit" value="Salvar!">
</td>
</tr>

</BODY>
</HTML>
