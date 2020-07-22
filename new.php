<?php
require("padrao.php");
?>
<center>
<form action="add.php" METHOD="get">
        <input type="hidden" name="responsavel" value="<?php echo $nome; ?>">

<table width="100%" border="0" align="center">
       <tr>
           <td width="20%">&nbsp;Respons&aacute;vel:</td>
           <td><b><? echo $nome; ?></b></td>
       </tr>
       <tr>
           <td>&nbsp;Nome do Cliente:</td>
           <td><input  type="text" name="nomecli" size="50" maxlength="50"></td>
       </tr>
       <tr>
           <td>&nbsp;Contato:</td>
           <td><input  type="text" name="contato" size="20"></td>
       </tr>
       <tr>
           <td>&nbsp;Telefones:</td>
           <td><input  type="text" name="telefone" size="20"></td>
       </tr>
       <tr>
           <td colspan="2">-------------------------------------------------------------------------------------------------------------------</td>
       </tr>
       <tr>
           <td>&nbsp;Modelo:</td>
           <td><input  type="text" name="modelo" size="30"></td>
       </tr>
       <tr>
           <td>&nbsp;BR:</td>
           <td><input  type="text" name="br" size="6"></td>
       </tr>
       <tr>
           <td>&nbsp;N� de S�rie:</td>
           <td><input  type="text" name="serie" size="20"></td>
       </tr>
       <tr>
           <td>&nbsp;MAC Address:</td>
           <td><input  type="text" name="mac" size="20"></td>
       </tr>
       <tr>
           <td>&nbsp;NF de Venda:</td>
           <td><input  type="text" name="nf_venda" size="6"></td>
       </tr>
       <tr>
           <td>&nbsp;Data NF de Venda:</td>
           <td><input  type="text" name="data_nf_venda" size="10" value="00/00/0000">&nbsp; Aten��o! Formato "01/01/1970"</td>
       </tr>
       <tr>
           <td>&nbsp;Garantia</td>
           <td>
               <select name="garantia">
                       <option value="n�o">N�O</option>
                       <option value="sim">SIM</option>
               </select>
           </td>
       </tr>
       <tr>
           <td>&nbsp;NF de Remessa:</td>
           <td><input  type="text" name="nf_remessa" size="6"></td>
       </tr>
       <tr>
           <td>&nbsp;Acess�rios:</td>
           <td>
               Conector:<input type="checkbox" name="conector" value="sim" />
               &nbsp;&nbsp;&nbsp;Fonte:<input type="checkbox" name="fonte" value="sim" />
               &nbsp;&nbsp;&nbsp;PoE:<input type="checkbox" name="poe" value="sim" />
               &nbsp;&nbsp;&nbsp;Pigtail:<input type="checkbox" name="pigtail" value="sim" />
               &nbsp;&nbsp;&nbsp;Ferragens:<input type="checkbox" name="ferragens" value="sim" />
           </td>
       </tr>
       <tr>
           <td>&nbsp;Outras Informa��es:</td>
           <td><textarea name="outros" cols="25" ></textarea></td>
       </tr>
       <tr>
           <td>&nbsp;Laudo do Cliente:</td>
           <td><textarea name="laudo" cols="38" ></textarea></td>
       </tr>
</table>

<p align="center"><input name="submit" type="submit" class="botao" value="Cadastrar">
<input name="reset" type="reset" class="botao" value="Refazer">
</p>
</form>
</body>
</html>


