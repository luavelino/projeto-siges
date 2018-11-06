<?php
	include "conexao.php";
	session_start();
	$login = $_POST['login'];
	$senha_inserida=$_POST['senha'];
	$senha = md5($senha_inserida);
	$consulta = mysql_query("select * from usuarios where login='$login' and senha = '$senha'",$con);
	$array = mysql_fetch_array($consulta);
	$senha_bd = $array['senha'];
	if ($senha == $senha_bd){
		$select= mysql_query("select tipoUsuario from usuarios where login='$login'",$con);
		$usuarios=mysql_fetch_array($select);
		$usuario = $usuarios['tipoUsuario'];	
		if($usuario=='professor'){
			$_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;
			$_SESSION['logado'] = true;
			echo("<script type='text/javascript'> alert('Usuário logado !'); location.href='professor.php?login=".$login."';</script>");
		}
		if($usuario=='assistente'){
			$_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;
			$_SESSION['logado'] = true;
			echo("<script type='text/javascript'> alert('Usuário logado !'); location.href='assistente.php?login=".$login."';</script>");
		}
		if($usuario=='aluno'){
			$_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;
			$_SESSION['logado'] =true;
			echo("<script type='text/javascript'> alert('Usuário logado !'); location.href='aluno.php?login=".$login."';</script>");
		}
	}
	else{
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		$_SESSION['logado'] = false;
		echo "<script language='javascript' type='text/javascript'>alert('Usuario ou senha incorretos!');window.location.href=index.php</script>";
	}
?>
