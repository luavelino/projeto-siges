<?php
    include "conexao.php";
    session_start();
    $login = $_SESSION['login'];
    $id = $_POST['id'];
    $codigo = $_POST['codigo'];
    if ($id == "" || $id==null) {
        echo("<script type='text/javascript'> alert('O campo ID deve ser preenchido !');location.href='entrarGrupo.php';</script>");
    }if ($codigo == "" || $codigo == null) {
         echo("<script type='text/javascript'> alert('O campo codigo deve ser preenchido!');location.href='entrarGrupo.php';</script>");
    }else{
        $sql = "select * from grupo where id = '$id' AND codigo = '$codigo'";
        $seleciona = mysql_query($sql,$con);
        if (mysql_num_rows($seleciona)>0){
            $inserir = "update aluno SET idGrupo = '$id' WHERE login ='$login'";
            $insert = mysql_query($inserir,$con);
            if ($insert == true) {
                $nome = $seleciona['nome'];
                 echo("<script type='text/javascript'> alert('Inscrição realizada no grupo $nome'); location.href='aluno.php?login=".$login."';</script>");
            }else{
                 echo("<script type='text/javascript'> alert('Inscrição não realizada !'); location.href='aluno.php?login=".$login."';</script>");
            }
        }else{
            echo("<script type='text/javascript'> alert('ID ou código incorrestos !'); location.href='entrarGrupo';</script>");
        }
    }


?>