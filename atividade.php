<?php
  include "conexao.php";
  $id = $_REQUEST['id'];
  $selecao= mysql_query("select * from atividade where id='$id'",$con);
  session_start();
  $login = $_SESSION['login'];
  ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página Principal do Grupo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
                    <li><a class="navbar-brand" <?php "href='aluno.php?login=".$loginPessoa."'"?> >SIGES</a></li>
                    <li class="active">
                        <a <?php "href='aluno.php?login=".$loginPessoa."'"?> ><i class="fa fa-fw fa-dashboard"></i> Home</a>
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
                    Atividades
                    </h1>
                </div>
            </div>
          </div>
    </div> 
    <div class="container">
      <table class="table table-bordered table-hover">
      <form action="cadastrarAtividades.php" enctype="multipart/form-data">
        <thead>
          <tr>
            <th>Atividades</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <input type="hidden" name="id" value="<?php echo $idGrupo; ?>">
          <input type="hidden" name="aluno" value="<?php echo $login;?>">
          <?php 
            while($linha=mysql_fetch_array($selecao)){
              echo "<tr>";
              echo "<td>".$linha['nome']."</td>";
              echo "<td>".$linha['obs']."</td>";
              echo "<td><input type='file' class='file'></td><br>";
              echo "<td><button type='submit' class='btn btn-info'>Salvar</button></td>";
              echo "</tr>";
            }
          ?>
        </tbody>
      </form>
      </table>
    </div>
  </body>
</html>
