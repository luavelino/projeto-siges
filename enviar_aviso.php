<?php
	require('conexao.php');
	$loginPessoa = $_POST['loginPessoa'];
	$idGrupo = $_POST['idGrupo'];
	$aviso = $_POST['texto'];
	$titulo = $_POST['titulo'];
	$inserir = mysql_query("insert into avisos (texto,idGrupo,loginProf,data,titulo) values ('$aviso','$idGrupo','$loginPessoa',NOW(),'$titulo')",$con);
	if ($inserir){
		echo("<script type='text/javascript'> alert('Aviso foi enviado ao grupo!'); location.href='grupo.php?id=".$idGrupo."';</script>");
	}else{
		echo("<script type='text/javascript'> alert('Não foi possível enviar o aviso!'); location.href='grupo.php?id=".$idGrupo."';</script>");
	}
?>