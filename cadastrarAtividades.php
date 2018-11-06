<?php
	include "conexao.php";
	$idGrupo = $_POST['id'];
	$nome = $_POST['nome'];
	$obs = $_POST['obs'];
	$date = $_POST['dataEnt'];
	$inserir = "insert into atividade(nome,idGrupo,dataEntrega,obs) values ('$nome','$idGrupo','$date','$obs')";
	$execute = mysql_query($inserir,$con);
	if ($execute){
		echo "<script type='text/javascript'> alert('Atividade cadastrada com sucesso !'); location.href='grupo.php?id=".$idGrupo."';</script>";
	}else{
		echo "<script type='text/javascript'> alert('Não foi possivel cadastrar a atividade !'); location.href='grupo.php?id=".$idGrupo."';</script>";
	}
?>
