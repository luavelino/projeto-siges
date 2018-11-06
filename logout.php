<?php
	session_start();
	session_destroy();
	echo "<script language='javascrpit' type='text/javascript' alert('Usuário Deslogado!');</script>";
	header('location:index.php');

?>