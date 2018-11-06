<?php
  include "conexao.php";
  if (isset($_FILES['arquivo']) ) {
    $nomeMaterial = $_POST['nomeArquivo'];
    $extensao = strtolower(substr($_FILES['arquivo']['name'],-4));
    $nome = md5(time()).$extensao;
    $diretorio = "upload/";
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$nome);
    $idGrupo = $_POST['id'];
    $sql_code = "insert into arquivo (arquivo,data,idGrupo,nome) values ('$nome',NOW(),'$idGrupo','$nomeMaterial')";
    if (mysql_query($sql_code,$con)){
      echo("<script type='text/javascript'> alert('Arquivo enviado com sucesso !'); location.href='grupo.php?id=".$idGrupo."';</script>");
    }else{
       echo("<script type='text/javascript'> alert('Arquivo não foi enviado!'); location.href='grupo.php?id=".$idGrupo."';</script>");
    }
  }
?>