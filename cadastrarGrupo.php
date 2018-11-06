<?php
	include "conexao.php";
	session_start();
	$login = $_SESSION['login'];
	$nome = $_POST['nome'];
	$codigo=$_POST['codigo'];
	$tipoGrupo = $_POST['tipoGrupo'];
	$select_id = mysql_query("select * from professor where login = '$login'",$con);
	$array = mysql_fetch_array($select_id);
	$loginProf = $array['login'];
	$query  = mysql_query( "insert into grupo (nome,codigo,tipoGrupo,loginProf) values ('$nome','$codigo','$tipoGrupo','$loginProf')",$con);
	if ($query== true){
		echo("<script type='text/javascript'> alert('Grupo cadastrado com sucesso !'); location.href='professor.php';</script>");
	}else{
		echo("<script type='text/javascript'> alert('Não foi possivel cadastrar o grupo !'); location.href='criarGrupo.php';</script>");
	}
?>