<?php
	include "conexao.php";
	$tam = count($_POST['nota']);
	$nome = $_POST['descricao'];
	$grupo = $_POST['grupo'];
	$peso = $_POST['peso'];
	for ($i=0; $i <$tam ; $i++) { 
		$loginAluno = $_POST['login'][$i];
		$nota = $_POST['nota'][$i];
		$notaFinal = $nota*$peso;
		$sql = "insert into notas (nota,loginAluno,idGrupo,descricao,peso) values('$nota','$loginAluno','$grupo','$nome','$peso') ";
		$inserir = mysql_query($sql,$con);
		if ($inserir) {
			echo("<script type='text/javascript'> alert('Notas lançadas com sucesso !'); location.href='grupo.php?id=".$grupo."';</script>");
		}else{
			echo("<script type='text/javascript'> alert('Não foi possivel cadastrar as notas !'); location.href='grupo.php?id=".$grupo."';</script>");
		}
	}
	

	

?>
