<?php
	include "conexao.php";
	$tam = count($_POST['falta']);
	$data = $_POST['data'];
	$obs = $_POST['obs'];
	$idGrupo = $_POST['grupo'];
	$qtdAulas = $_POST['qt'];
	for ($i=0; $i <$tam ; $i++) { 
		$loginAluno = $_POST['login'][$i];
		$falta = $_POST['falta'][$i];
		$sql = "insert into faltas (falta,idGrupo,loginAluno,dia,obs,qtAula) values('$falta','$idGrupo','$loginAluno','$data','$obs','$qtdAulas') ";
		$inserir = mysql_query($sql,$con);
		if ($inserir) {
			echo("<script type='text/javascript'> alert('Faltas lançadas com sucesso !'); location.href='grupo.php?id=".$idGrupo."';</script>");
		}else{
			echo("<script type='text/javascript'> alert('Faltas não foram lançadas!'); location.href='grupo.php?id=".$idGrupo."';</script>");		
		}
	
	}
	

?>
