<?php

function converte_data($data){
        if (strstr($data, "/")){
                $A = explode ("/", $data);
                $V_data = $A[2] . "-". $A[1] . "-" . $A[0];
        }
        elseif (strstr($data, "-")){
                $A = explode ("-", $data);
                $V_data = $A[2] . "/". $A[1] . "/" . $A[0];
        }
        return $V_data;
}

/****************************/
function desconto($tempo,$valor){
    $desconto = ceil(($tempo * $valor)/720);
    return $desconto;
}
/****************************/

/****************************/
function botao($nome_botao,$link){
?>
<form method="get" action="<? echo $link; ?>">
<input type="submit" value="<? echo $nome_botao; ?>" class="botao" name="botao">
</form>
<?php 
}

/*
Fun�ao de c�lculo de horas.
Pega duas datas e duas horas e calcula o quanto tempo em horas tem de uma a
outra.
Sempre arredonda para o inteiro mais alto.
Sintaxe: int tempo(str $data1, str $hora1, srt $data2, str $hora2);
Exemplo: tempo("1981-03-20","06:00:00",date("Y-m-d"),date("H:i:s"));
Retorna o valor em horas, desde a data do meu nascimento at� hoje (!!)
By Bluverts - bluverts@terra.com.br
*/
function tempo($data1,$hora1,$data2,$hora2){

    $i = split(":",$hora1);
    $j = split("-",$data1);
    $k = split(":",$hora2);
    $l = split("-",$data2);

$tempo1 = mktime($i[0],$i[1],$i[2],$j[1],$j[2],$j[0]);
$tempo2 = mktime($k[0],$k[1],$k[2],$l[1],$l[2],$l[0]);

$tempo = ceil((($tempo2 - $tempo1)/60)/60/24);
return $tempo;
}

$data_agora = date("Y-m-d");
$hora_agora = date("H:i:s");
?>