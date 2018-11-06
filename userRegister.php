<?php
	include "conexao.php";
	$login = $_POST['login'];
	$senha_inserida = $_POST['password'];
	$confirma_inserida = $_POST['confirmpassword'];
	$senha = md5($senha_inserida);
	$confirma = md5($confirma_inserida);
	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$tipoUsu = $_POST['rad'];
	$loginProf = $_POST['loginProf'];
	$query_select = "select login from usuarios where login ='$login'";
	$select = mysql_query($query_select,$con);
	$array = mysql_fetch_array($select);
	$logarray = $array['login'];
	if ($login =="" || $login == null){
		echo "<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='cadastro.html';</script>";
	}else{
		if($logarray ==$login){
			echo"<script language='javascript' type='text/javascript'>alert('Esse login ja existe');window.location.href='cadastro.html';</script>";
		}else{
			if ($senha!==$confirma) {
				echo"<script language='javascript' type='text/javascript'>alert('As senhas nao conferem');window.location.href='cadastro.html';</script>";
			}else{
	        $query = "insert into usuarios (login,senha,nome,tipoUsuario) VALUES ('$login','$senha','$nome','$tipoUsu')";
	        $insert = mysql_query($query,$con);
	        $busca = mysql_query("select id from usuarios where login='$login'",$con);
	        			$lista = mysql_fetch_array($busca);
	        			$idUser = $lista['id'];
	        	if($insert == true){
	        		if($tipoUsu == 'professor'){
	        			
	        			mysql_query("insert into professor(login,senha,nome,cpf,idUser) VALUES ('$login','$senha','$nome','$cpf','$idUser')",$con);
	        			echo"<script language='javascript' type='text/javascript'>alert('Usuario cadastrado com sucesso!');window.location.href='index.php'</script>";
	        		}
	        		if($tipoUsu == 'assistente'){
	        			if ($loginProf=="" || $loginProf == null){
							mysql_query("Delete from usuarios where login = '$login'",$con);
	        				echo "<script language='javascript' type='text/javascript'>alert('O campo login do professor responsavel deve ser preenchido');window.location.href='cadastro.html';</script>";
	        			}else{
	   							$res = mysql_query("select * from professor where login = '$loginProf'",$con);
								if (mysql_num_rows($res) > 0){
									mysql_query("insert into assistente(login,senha,nome,cpf,loginProf,idUser) VALUES ('$login','$senha','$nome','$cpf','$loginProf','$idUser')",$con);
									echo"<script language='javascript' type='text/javascript'>alert('Usuario cadastrado com sucesso');window.location.href='index.php'</script>";
									
								}
								else{
								mysql_query("Delete from usuarios where login = '$login'",$con);
	        						echo "<script language='javascript' type='text/javascript'>alert('O id informado referente ao professor nao existe');window.location.href='cadastro.html';</script>";

									header('location:cadastro.html');
								}
	        				}	        			        			
	        			}
	        		if($tipoUsu == 'aluno'){
	        			mysql_query("insert into aluno(login,senha,nome,cpf,idUser) VALUES ('$login','$senha','$nome','$cpf','$idUser')",$con);
	        			echo"<script language='javascript' type='text/javascript'>alert('Usuario cadastrado com sucesso!');window.location.href='index.php'</script>";
	        			}
	       		}else{
	          		echo"<script language='javascript' type='text/javascript'>alert('Nao foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
	        	}
	        }
		}
	}
?>
