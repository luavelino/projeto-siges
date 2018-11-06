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
                    <li><a class="navbar-brand" <?php include "conexao.php"; $idGrupo = $_REQUEST['id']; "href='grupo?id=".$idGrupo."php'"?>> SIGES</a></li>
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
                    Notas do Grupo
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
	  			<th>Nota Total</th>
          <th>Status</th>
          <th>Acão</th>
	  		</tr>
	  	</thead>
	  	<tbody>
	  		<?php
          $somaNotas = mysql_query("select loginAluno, sum(nota) as notaFinal from notas where idGrupo ='$idGrupo' group by loginAluno",$con);
          $media = mysql_query("select mediaNota from regras where idGrupo = '$idGrupo'",$con);
          $lista = mysql_fetch_array($media);
          $mediaNota = $lista['mediaNota'];
          while($linha= mysql_fetch_array($somaNotas)){
            $loginAluno = $linha['loginAluno'];
            echo "<tr>";
						echo "<td>".$loginAluno."</td>";  
						echo "<td>".$linha['notaFinal']."</td>";
            if (eval($linha['notaFinal'] >= $mediaNota)) {
              echo "<td style='color: green;'>Aprovado</td>";
            }else{
              echo "<td style='color: red;'>Reprovado</td>";
            }
            echo "<td><a class='btn btn-success' href='notaAluno.php?login=".$loginAluno."'>Ver notas do aluno</a></td>";
						echo "</tr>";
					}
			?>
	  	</tbody>
	  </table>
   </div>
 </body>
</html>