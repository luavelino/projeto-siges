<?php

	$con= mysql_connect('localhost','root','usbw') or die('Não foi possivel se conectar!');
	mysql_select_db('projeto_final') or die( 'Não foi possivel se conectar ao bando de dados');
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');


?>