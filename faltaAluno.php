<?php
	include "conexao.php";
	$loginAluno = $_REQUEST['login'];
  	$select = mysql_query("select * from aluno where login='$loginAluno'",$con);
  	$array = mysql_fetch_array($select);
  	$nomeAluno = $array['nome'];
  	$idGrupo = $array['idGrupo'];
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
                    <li><a class="navbar-brand" <?php echo "href='grupo.php?id=".$idGrupo."php'"?>> SIGES</a></li>
                    <li class="active">
                       <a <?php echo "href='grupo.php?id=".$idGrupo."php'"?>> <i class="fa fa-fw fa-dashboard"></i> Home</a>
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
                    Faltas de <?php echo $nomeAluno; ?>
                  </h1>
              </div>
          </div>
      </div>
  </div>
  <div class="container">
  	<div class="row">
	  	<div class="col-lg-8">
		  <table class="table table-bordered table-hover">
		  	<thead>
		  		<tr>
		          <th>Faltas</th>
		          <th>Dia</th>
		          <th>Conteudo/Observação</th>
		        </tr>
		  	</thead>
		  	<tbody>
			<?php
	          $s = mysql_query("select * from faltas where idGrupo='$idGrupo' AND loginAluno = '$loginAluno'",$con);
	          while($linha= mysql_fetch_array($s)) {
	              $loginAluno = $linha['loginAluno'];
	              echo "<tr>";
	              echo "<td>".$linha['falta']."</td>";
	              echo "<td>".$linha['dia']."</td>";
	              echo "<td>".$linha['obs']."</td>";
	              echo "</tr>";
			}
			?>	
			</tbody>
		   </table>
		</div>
	</div>
</div>	
</body>
</html>