<?php
  include "conexao.php";
  $id = $_REQUEST["id"];

  if (isset($_REQUEST["id"])) {
    // Consulta 
    $_SESSION['grupo'] = $id;
    $_sql  = "Select * from grupo where id= '$id'; " ;         
    $_res = mysql_query($_sql,$con);    
    $c = mysql_fetch_array($_res);  
    $nome = $c['nome'];
    $loginPessoa = $c['loginProf'];
    $idGrupo = $id;
    $id = $c['id'];
    $codigo = $c['codigo'];
  }    
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
                    <?php echo $nome;?>
                  </h1>
              </div>
          </div>
      </div>
  </div>  
  <div class="container theme-showcase" role="main">
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#principal" aria-controls="principal" role="tab" data-toggle="tab">Principal</a></li>
      <li role="presentation"><a href="#aviso" aria-controls="aviso" role="tab" data-toggle="tab">Avisos</a></li>
      <li role="presentation"><a href="#membros" aria-controls="membros" role="tab" data-toggle="tab">Membros</a></li>
      <li role="presentation"><a href="#materiais" aria-controls="materiais" role="tab" data-toggle="tab">Materiais</a></li>
      <li role="presentation"><a href="#atividades" aria-controls="atividades" role="tab" data-toggle="tab">Atividades</a></li>
      <li role="presentation"><a href="#notas" aria-controls="notas" role="tab" data-toggle="tab">Notas</a></li>
      <li role="presentation"><a href="#faltas" aria-controls="faltas" role="tab" data-toggle="tab">Faltas</a></li>
      <li role="presentation"><a href="#regras" aria-controls="regras" role="tab" data-toggle="tab">Regras do Grupo</a></li>
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
                        $res = mysql_query("select * from mensagem where idGrupo ='$idGrupo' AND loginPara='$loginPessoa' order by data",$con);
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
                    $consulta = mysql_query("select * from arquivo where idGrupo = '$idGrupo'",$con);
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
                        echo "<td><a class='glyphicon glyphicon-pencil' href='atividadeProf.php?id=".$linha['id']."'>".$linha['nome']."</a></td>";
                        echo "<tr>";
                      }

                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="aviso">
          <br>
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="form-group">
                    <form action="enviar_aviso.php" method="POST">
                        <input type="hidden" class="form-control" name="loginPessoa" id="loginPessoa" value="<?php echo $loginPessoa; ?>">
                        <input type="hidden" class="form-control" name="idGrupo" id="idGrupo" value="<?php echo $idGrupo; ?>">
                        <label for="titulo" class="control-label">Titulo:</label><br>
                        <input type="text" name="titulo" class="form-control" id="texto" required=""><br> 
                        <label for="texto" class="control-label">Envie um aviso para a turma:</label><br>
                        <textarea class="form-control" name="texto" id="texto"></textarea><br>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-primary">Enviar aviso</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="membros">
          <form>
            <div class="form-group">
              <br>
              <div class="row">
                <div class="col-lg-8">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-8">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Nome do Aluno</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $_sql = "select nome from aluno where idGrupo = '$id'";
                            $query = mysql_query($_sql,$con); 
                            while($_linha = mysql_fetch_array($query)) {
                              echo "<tr>";  
                              echo "<td>" . $_linha['nome'] . "</td>";
                              echo "<td><img href='images\icone-msg.png'>"."<a href='mensagem.php'</a></td>";
                              echo "</tr>";
                          }
                        ?>
                      </tbody>
                    </table>                  
                  </div>        
                </div>
              </div>
            </div>  
          </form>
        </div>
        <div role="tabpanel" class="tab-pane" id="materiais">
          <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <br>
              <div class="row">
                <div class="col-lg-8">
                  <input type="hidden" name="id" value="<?php echo $idGrupo; ?>">
                  <input type="text" class="form-control" id="material" name="nomeArquivo" placeholder="Nome do Material ...">
                  <br>
                  <label class="control-label">Selecione o arquivo</label>
                  <input id="arquivo" name="arquivo" type="file" class="file"><br>
                  <button type="submit" class="btn btn-info">Salvar</button>
                </div>
              </div>  
            </div>
          </form>
        </div>
        <div role="tabpanel" class="tab-pane" id="atividades">
          <form action="cadastrarAtividades.php" method="POST">
            <div class="form-group">
              <br>
              <div class="row">
                <div class="col-lg-8">
                  <input type="hidden" name="id" value="<?php echo $idGrupo; ?>">
                  <input type="text" class="form-control" id="atividades" name="nome" placeholder="Nome da Atividade ..." required="">
                  <br>
                  <label for="data" class="control-label">Data de Entrega:</label><br>
                  <input type="date" name="dataEnt" class="form-control"><br>
                  <textarea class="form-control" name="obs" rows="3" required=""></textarea><br>
                  <button type="submit" class="btn btn-info">Salvar</button>
                </div>
              </div>  
            </div>
          </form>
        </div>
        <div role="tabpanel" class="tab-pane" id="notas">
          <br>
          <?php echo "<a class='btn btn-success btn-md' href='visualizarNotas.php?id=".$idGrupo."'>Visualizar Notas</a>" ?>
          <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalCadNotas" data-whatever="<?php echo $idGrupo; ?>">Lançar Notas</button>
          <div class="modal fade" id="modalCadNotas" tabindex="-1" role="dialog" aria-labelledby="modalCadNotas">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Lançamento de Notas</h4>
                  </div>
                  <div class="modal-body">
                    <form action="cadastrarNotas.php" method="POST">
                      <div class="form-group">
                        <label for="recipient-name" class="control-label">Nome ou descrição da nota:</label>
                        <input type="text" class="form-control" id="descricao" name="descricao">
                      </div>
                      <div class="form-group">
                        <label for="recipient-peso" class="control-label">Peso da nota:</label>
                        <select name="peso">
                            <option></option>
                            <option value='0.1' >10%</option>
                            <option value='0.15' >15%</option>
                            <option value='0.2' >20%</option>
                            <option value='0.25' >25%</option>
                            <option value='0.30' >30%</option>
                            <option value='0.35' >35%</option>
                            <option value='0.40' >40%</option>
                            <option value='0.45' >45%</option>
                            <option value='0.50' >50%</option>
                            <option value='0.55' >55%</option>
                            <option value='0.60'>60%</option>
                            <option value='0.65'>65%</option>
                            <option value='0.70'>70%</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                  <th>Aluno</th>
                                  <th>Notas</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include ("conexao.php");
                                    $_sql = "select nome,login from aluno where idGrupo = '$idGrupo'";
                                    $query = mysql_query($_sql,$con);
                                    while($_linha = mysql_fetch_array($query)) {
                                        $loginAluno = $_linha['login'];
                                        $nome = $_linha['nome'];
                                         echo "<td>".$nome."</td>";
                                         echo "<input type='hidden' name='grupo' value='$idGrupo'>";
                                         echo "<input type='hidden' name='login[]' value='$loginAluno'>";
                                         echo "<td><input type='text' name='nota[]'></td>";
                                         echo "</tr>";
                                    }
                                ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="faltas">
          <br>
          <?php echo "<a class='btn btn-success btn-md' href='visualizarFaltas.php?id=".$idGrupo."'>Visualizar Faltas</a>"?>
          <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalCadFaltas" data-whatever="<?php echo $idGrupo; ?>">Lançar Faltas</button>
          <div class="modal fade" id="modalCadFaltas" tabindex="-1" role="dialog" aria-labelledby="modalCadFaltas">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Lançamento de Faltas</h4>
                  </div>
                  <div class="modal-body">
                    <form action="cadastrarFaltas.php" method="POST">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-lg-12">
                            <label for="recipient-name" class="control-label">Dia:</label><br>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4">
                            <input type="date" class="form-control" id="data" name="data">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4">
                           <label for="qt" class="control-label">Quantidade de Aulas</label>
                            <input type="text" name="qt" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="obs">Conteúdo/Observação</label>
                        <input type="text" name="obs" class="form-control">
                      </div>
                      <div class="form-group">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                  <th>Aluno</th>
                                  <th>Faltas</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include ("conexao.php");
                                    $_sql = "select nome,login from aluno where idGrupo = '$idGrupo'";
                                    $query = mysql_query($_sql,$con);
                                    while($_linha = mysql_fetch_array($query)) {
                                        $loginAluno = $_linha['login'];
                                        $nome = $_linha['nome'];
                                         echo "<td>".$nome."</td>";
                                         echo "<input type='hidden' name='grupo' value='$idGrupo'>";
                                         echo "<input type='hidden' name='login[]' value='$loginAluno'>";
                                         echo "<td><input type='text' name='falta[]'></td>";
                                         echo "</tr>";
                                    }
                                ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
           </div>
            <div role="tabpanel" class="tab-pane" id="regras">
              <form action="regras.php" method="POST">
                <div class="form-group">
                  <br>
                  <label class="control-label">Selecione a média da nota final</label>
                  <select class="form-control" style="width: 100px;" name="media">
                    <option value=""></option>
                    <option value="60">60</option>
                    <option value="65">65</option>
                    <option value="70">70</option>
                    <option value="75">75</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Digite a carga horária da matéria</label>
                  <input type="text" name="carga">
                </div>
                <div class="form-group">
                  <label class="control-label">Porcentagem minima de presença do aluno</label>
                  <input type="text" name="minimoHoras"><br>
                  <input type="hidden" name="grupo" value="<?php echo $idGrupo; ?>">
                  <button type="submit" name="Enviar" class="btn btn-success"> Salvar</button>
                </div>
              </form>
            </div>
        </div>   
    </div>  
</body>
</html>

    <script>
      $('#modalCadNotas').on('show.bs.modal', function (event) {
         var button = $(event.relatedTarget) // Button that triggered the modal
         var recipient = button.data('whatever') // Extract info from data-* attributes
         // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
         // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
         var modal = $(this)
         modal.find('.modal-title').text('Lançamento de Notas')
         modal.find('#grupo').val(recipient)
      })
    </script>
    <script>
       $('#modalCadFaltas').on('show.bs.modal', function (event) {
         var button = $(event.relatedTarget) // Button that triggered the modal
         var recipient = button.data('whatever') // Extract info from data-* attributes
         // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
         // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
         var modal = $(this)
         modal.find('.modal-title').text('Lançamento de Faltas')
         modal.find('#grupo').val(recipient)
      })
    </script>