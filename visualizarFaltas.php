<?php
	include "conexao.php";
	$idGrupo = $_REQUEST['id'];
  $select = mysql_query("select * from aluno where idGrupo = '$idGrupo'",$con);
  $array = mysql_fetch_array($select);
  $nomeAluno = $array['nome'];
?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="funcoes.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página Principal do grupo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      .principal{
        background-color:
        lavender;width:500px;
      }
    </style>
  </head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a class="navbar-brand" <?php "href='grupo?id=".$idGrupo."php'"?>> SIGES</a></li>
                    <li class="active">
                       <a <?php "href='grupo?id=".$idGrupo."php'"?>> <i class="fa fa-fw fa-dashboard"></i> Home</a>
                    </li>
                    <li><a href="logout.php"><i class="glyphicon glyphicon-off"></i> </a>
                    </li>
                </ul>
        </div>
  </nav>
  <div id="page-wrapper">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">
                  <br><br>
                    Notas de <?php echo $nomeAluno; ?>
                  </h1>
              </div>
          </div>
      </div>
  </div>
  <div class="container">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Aluno</th>
          <th>Falta Total</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $somaFaltas = mysql_query("select loginAluno, sum(falta) as faltaFinal from faltas where idGrupo ='$idGrupo' group by loginAluno",$con);
        $media = mysql_query("select cargaHoraria,cargaMinima from regras where idGrupo ='$idGrupo'",$con);
        $lista = mysql_fetch_array($media);
        $cargaMinima = $lista['cargaMinima'];
        $carga = $lista['cargaHoraria'];
        while($linha= mysql_fetch_array($somaFaltas)) {
            $loginAluno = $linha['loginAluno'];
            $soma_faltas = $linha['faltaFinal'];
            echo "<tr>";
            echo "<td>".$loginAluno."</td>";
            echo "<td>".$soma_faltas."</td>";
            echo "<td><a class='btn btn-success' href='faltaAluno.php?login=".$loginAluno."'>Ver faltas do aluno</a></td>";
            echo "</tr>";
          }
      ?>
      </tbody>
    </table>
   </div>
</body>
</html>
