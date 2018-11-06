<?php
  include "conexao.php";
  session_start();
  $loginPessoa = $_SESSION['login'];
  $idGrupo = $_REQUEST["id"];

  if (isset($_REQUEST["id"])) {
    // Consulta 
    $_sql  = "Select * from grupo where id= '$idGrupo'; " ;         
    $_res = mysql_query($_sql,$con);    
    $c = mysql_fetch_array($_res);  
    $nome = $c['nome'];
    $loginProf = $c['loginProf'];
    
    
  }    
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
                    <?php echo $nome ?>
                    </h1>
                </div>
            </div>
          </div>
    </div>  
    <div class="container theme-showcase" role="main">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#principal" aria-controls="principal" role="tab" data-toggle="tab">Principal</a></li>
        <li role="presentation"><a href="#mensagem" aria-controls="mensagem" role="tab" data-toggle="tab">Mensagem</a></li>
        <li role="presentation"><a href="#notas" aria-controls="notas" role="tab" data-toggle="tab">Notas</a></li>
        <li role="presentation"><a href="#faltas" aria-controls="faltas" role="tab" data-toggle="tab">Faltas</a></li>
      </ul>
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="principal">
            <br><br>
            <div class="container">
              <div class="row">
                <div class="col-lg-4">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <th>Avisos</th>
                    </thead>
                    <tbody>
                        <?php
                          include "conexao.php";
                          $res = mysql_query("select * from avisos where idGrupo ='$idGrupo' order by data DESC",$con);
                          while ($linha = mysql_fetch_array($res)){
                            $id_aviso = $linha['id'];
                            echo "<tr>";
                            echo "<td><a href='aviso.php?id=".$id_aviso."'>".$linha['titulo']."</a></td>";
                            echo "</tr>";
                          }
                          ?>
                    </tbody>
                  </table>
                 </div> 
                <div class="col-lg-4">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <th>Mensagens</th>
                    </thead>
                    <tbody>
                      <?php
                        include "conexao.php";
                        $res = mysql_query("select * from mensagem where loginPara ='$loginPessoa' AND idGrupo ='$idGrupo' order by data",$con);
                        while ($linha = mysql_fetch_array($res)){
                          $id_mensagem = $linha['id'];
                          $pessoaDe = $linha['loginDe'];
                          echo "<tr>";
                          echo "<td> <a href='mensagem.php?id=" .$id_mensagem."'>"."De: ".$pessoaDe."</a></td>";
                          echo "</tr>";
                        }
                        ?>
                    </tbody>
                  </table>
                </div> 
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <th>Materiais</th>
                    </thead>
                    <tbody>
                      <?php
                      $consulta = mysql_query("select * from arquivo where idGrupo = '$idGrupo'");
                      while ($linha = mysql_fetch_array($consulta)) {
                        echo "<tr>";
                        echo "<td><a class='glyphicon glyphicon-file' href='upload/".$linha['arquivo']."'>".$linha['nome']."</a></td>";
                        echo "</tr>";
                      }
                      ?> 
                    </tbody>
                  </table>    
                </div>
                <div class="col-lg-4">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <th>Atividades</th>
                    </thead>
                    <tbody>
                    <?php
                      $seleciona = mysql_query("select * from atividade where idGrupo='$idGrupo'",$con);
                      while($linha = mysql_fetch_array($seleciona)){
                        echo "<tr>";
                        echo "<td><a class='glyphicon glyphicon-pencil' href='atividade.php?id=".$linha['id']."'>".$linha['nome']."</a></td>";
                        echo "<tr>";
                      }

                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="mensagem">
          <br>
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="form-group">
                  <form action="enviar_mensagem.php" method="POST">
                    <input type="hidden" class="form-control" name="loginPessoa" id="loginPessoa" value="<?php echo $loginPessoa; ?>">
                    <input type="hidden" class="form-control" name="idGrupo" id="idGrupo" value="<?php echo $idGrupo; ?>"> 
                    <label for="para" class="control-label">Para:</label><br>
                    <input type="text" name="para" id="para" class="form-control" disabled="" value="<?php echo $loginProf;?>" placeholder="<?php echo $loginProf; ?>"><br>
                    <label for="texto" class="control-label">Texto:</label><br>
                    <textarea class="form-control" name="texto" id="texto"></textarea><br>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="notas">
            <div class="container">
              <br><br>
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Notas</th>
                    <th>Descrição</th>
                    <th>Média mínima</th>
                    <th>Quanto Possui</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $s = mysql_query("select * from notas where idGrupo='$idGrupo' AND loginAluno = '$loginPessoa'",$con);
                    $media = mysql_query("select mediaNota from regras where idGrupo = '$idGrupo'",$con);
                    $lista = mysql_fetch_array($media);
                    $notas = mysql_query("select sum(nota) as notaFinal from notas where idGrupo ='$idGrupo' AND loginAluno='$loginPessoa'",$con);
                    $nota = mysql_fetch_array($notas);
                    $notaFinal = $nota['notaFinal'];
                    $mediaNota = $lista['mediaNota'];
                    while($linha= mysql_fetch_array($s)) {
                        $loginAluno = $linha['loginAluno'];
                        echo "<tr>";
                        echo "<td>".$linha['nota']."</td>";
                        echo "<td>".$linha['descricao']."</td>";
                        echo "<td>".$mediaNota."</td>";
                        echo "<td>".$notaFinal."</td>";
                        echo "</tr>";
                      }
                ?>
                </tbody>
              </table>  
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="faltas">
          <br><br>
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
                    $s = mysql_query("select * from faltas where idGrupo='$idGrupo' AND loginAluno = '$loginPessoa'",$con);
                    while($linha= mysql_fetch_array($s)) {
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
        </div>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>