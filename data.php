<?php
/*
// Deprecated PHP7
$user = $_SERVER['REMOTE_USER'];
if($user == 'claudia'){
$nome = "Claudia";
}
if($user == 'leticia'){
$nome = "Leticia";
}
if($user == 'tatiane'){
$nome = "Tatiane";
}
if($user == 'ivan'){
$nome = "Ivan Monteiro";
}
if($user == 'andre'){
$nome = "Carlos Andr� Cabral";
}
if($user == 'rodrigo'){
$nome = "Rodrigo";
}
if($user == 'marcio'){
$nome = "Marcio";
}
if($user == 'marcus'){
$nome = "Marcus Mar�al";
}
if($user == 'leonardo'){
$nome = "Leonardo Faleiro";
}
*/

$nome = "Dionei";
$datadia=date("d");  //Retornao dia do m�s com dois d�gitos e zeros � esquerda (de 01 a 31).
$dataano=date("Y");  //Retorna o ano no formato de quatro d�gitos (2000, 2001, etc.).

//armazena os dias da semana na matriz $diasemana

$dia=date("w");  //Retorna o dia da semana num�rico (0=domingo, 1=segunda,etc.).
$diasemana[0]="Domingo";
$diasemana[1]="Segunda-feira";
$diasemana[2]="Ter�a-feira";
$diasemana[3]="Quarta-feira";
$diasemana[4]="Quinta-feira";
$diasemana[5]="Sexta-feira";
$diasemana[6]="S�bado";


//armazena os meses do ano na matriz $mesano

$mes=date("n"); //Retorna o m�s do ano, representado por um n�mero (1 a12).
$mesano[1]="janeiro";
$mesano[2]="fevereiro";
$mesano[3]="mar�o";
$mesano[4]="abril";
$mesano[5]="maio";
$mesano[6]="junho";
$mesano[7]="julho";
$mesano[8]="agosto";
$mesano[9]="setembro";
$mesano[10]="outubro";
$mesano[11]="novembro";
$mesano[12]="dezembro";

// Exibir uma data com sauda��o

$hora=date("G");
$minuto=date("i");


if ($hora>=0 && $hora<12)
{$saudacao= "Bom dia";}

if ($hora>=12 && $hora<18)
{$saudacao= "Boa tarde";}

if ($hora>=18)
{$saudacao= "Boa noite";}


echo "$saudacao $nome. $diasemana[$dia], $datadia de $mesano[$mes] de $dataano.";


?> 
