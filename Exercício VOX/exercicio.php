<?php
//ALTERANDO DOCUMENTO PARA HTML
header('Content-Type: text/html; charset=utf-8');

//----------------------------------------------------
//Abrindo conexão com banco de dados local
@$conexao = mysql_connect('localhost', 'root', '');
$res = mysql_select_db('teste1');

//----------------------------------------------------
//Abrir diretório
$baseDir = getcwd();

//----------------------------------------------------
// r = lear
// w = escrever
// a = anexar

//Ler arquivo
$fileRead = fopen("{$baseDir}/exercicio.txt", 'r');

while (!feof($fileRead)):
	$dado = fgets($fileRead);
	
	$conteudo[] = $dado;
	//excluindo a inserção de dados que não sejam dos usuários
	if (count($conteudo)>1 && count($conteudo)<=10):
		$id = substr($dado, -47, -44);
		$nome = substr($dado, -43, -19);
		$lingua = substr($dado, -19, -17);
		$idade = substr($dado, -17, -15);
		$rendaPropriaMensal = substr($dado, -15, -7);
		$diaNasc = substr($dado, -7, -5);
		$mesNasc = substr($dado, -5, -3);
		$xp = substr($dado, -3, 49);
		
		//inserindo dados nos respectivos campos da tabela do BD
		$sql = mysql_query("insert into usuario(id, nome, lingua, idade,
							rendapropriamensal, dia_nasc, mes_nasc, xp_mercado)
							values('$id','$nome', '$lingua', '$idade', 
							'$rendaPropriaMensal', '$diaNasc', '$mesNasc','$xp')");
	else:
	endif;
	
endwhile;
fclose($fileRead);