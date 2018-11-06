<?php

	include "conexao.php";

	$id = $_REQUEST["id"];
	
	$_sql  = "Delete from grupo where id= '$id'; ";
	$_res = mysql_query($_sql,$con);
	if($_res==true){
		echo "<script language='javascript' type='text/javascript'>alert('Grupo Excluido com sucesso');window.location.href='professor.php';</script>";	
	}else{
		echo "<script language='javascript' type='text/javascript'>alert('Não foi possível excluir o grupo');window.location.href='professor.php';</script>";	  	
		header("location: professor.php");
	}
?>	
