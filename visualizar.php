<?php
  include "conexao.php";
  $sql = mysql_query("select * from id_falta where idGrupo = 19",$con);
  $tam = mysql_num_rows($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<table border="1">
  <thead>
      <!--<td>Alunos</td>-->
      <tr>
      <?php
        echo "<td>Alunos</td>";
        while($array = mysql_fetch_array($sql)) {
            echo "<td>".$array['dia']."</td>";
        }
      ?>
      
  </thead>
  <tbody>
      <tr>
      <?php
        $busca = mysql_query("select * from id_falta where idGrupo = 19",$con);
        while($array1=mysql_fetch_array($busca) ){
          $idFalta = $array1['id_falta'];
          $select  = mysql_query("select * from faltas where id_falta = '$idFalta'",$con);
          $tamanho=mysql_num_rows($select);
          while ($linha = mysql_fetch_array($select)){
              $idAluno = $linha['idAluno'];
              $select_nome = mysql_query("select nome from aluno where id = '$idAluno'",$con);
              $arrayNome = mysql_fetch_array($select_nome);
              echo "<td>".$arrayNome['nome']."</td>";
              echo "<td>".$linha['falta']."</td>";
          }
        }
  ?>
  </tbody>
</table>
</body>
</html>