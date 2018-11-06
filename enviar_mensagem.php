<?php
	require('conexao.php');
	$loginPessoa = $_POST['loginPessoa'];
	$idGrupo = $_POST['idGrupo'];
	$seleciona = $_POST['seleciona']; 
	$destinatario = $_POST['para'];
	$mensagem = $_POST['texto'];
	$inserir = mysql_query("insert into mensagem (texto,loginDe,loginPara,idGrupo,data) values ('$mensagem','$loginPessoa','$destinatario','$idGrupo',NOW())",$con);
	if($inserir){
		echo("<script type='text/javascript'> alert('Mensagem enviada com sucesso !');history.back();</script>");
	}else{
		echo("<script type='text/javascript'> alert('Mensagem não enviada !');history.back()</script>");
	}
?>