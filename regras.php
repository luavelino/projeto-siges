<?php
	include "conexao.php";
	$mediaNota = $_POST['media'];
	$cargaHoraria = $_POST['carga'];
	$cargaMinima = eval($_POST['minimoHoras']/100);
	$idGrupo = $_POST['grupo'];
	$select = mysql_query("select * from regras where idGrupo='$idGrupo'",$con);
	if(mysql_num_rows($select)>0){
		echo("<script type='text/javascript'> alert('Já existem regras cadastradas para esse grupo!'); location.href='grupo.php?id=".$idGrupo."';</script>");
	}else{
		$insira = mysql_query("insert into regras (cargaHoraria,idGrupo,cargaMinima,mediaNota) values ('$cargaHoraria','$idGrupo','$cargaMinima','$mediaNota')",$con);
		if ($insira) {
			echo("<script type='text/javascript'> alert('Regras cadastradas com sucesso!'); location.href='grupo.php?id=".$idGrupo."';</script>");
		}else{
			echo("<script type='text/javascript'> alert('Falha ao cadastrar as regras do grupo!'); location.href='grupo.php?id=".$idGrupo."';</script>");
		}
	}

?>