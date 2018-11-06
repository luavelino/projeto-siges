<?php
  include "conexao.php";
  $id = $_REQUEST["id"];

  if (isset($_REQUEST["id"])) {
    // Consulta 
    $_sql  = "Select * from grupo where id= '$id'; " ;         
    $_res = mysql_query($_sql,$con);    
    $c = mysql_fetch_array($_res);  
    $nome = $c['nome'];
  }    
?>
<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Criar pagina com abas</title>
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
                    <li><a class="navbar-brand" href="home.php" >PROJETO SEM NOME</a></li>
                    <li class="active">
                        <a href="home.php"><i class="fa fa-fw fa-dashboard"></i> Home</a>
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
        <li role="presentation" class="active"><a href="#mensagem" aria-controls="mensagem" role="tab" data-toggle="tab">Mensagem</a></li>
        <li role="presentation"><a href="#membros" aria-controls="membros" role="tab" data-toggle="tab">Membros</a></li>
        <li role="presentation"><a href="#atividades" aria-controls="atividades" role="tab" data-toggle="tab">Atividades</a></li>
      </ul>
    <div class="tab-content">
      
        <div role="tabpanel" class="tab-pane active" id="mensagem">
          <form>
          <div class="form-group">
            <br>
            <div class="row">
              <div class="col-lg-8">
                <input type="text" class="form-control" id="mensagem" placeholder="Mensagem ...">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8">
                <br>
                <input type="text" class="form-control" name="procura" id="procura" placeholder="Destinatário">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8">
                <br>
                <button type="submit" class="btn btn-info">Enviar</button>
              </div>
            </div>
          </div>
          </form>
        </div>
        <div role="tabpanel" class="tab-pane" id="membros">
            <form>
            <div class="form-group">
              <br>
              <div class="row">
                <div class="col-lg-8">
                  <input type="text" class="form-control" id="membros" placeholder="membros ...">
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
                  <input type="hidden" name="id" value="<?=$id?>">
                  <input type="text" class="form-control" id="atividades" name="nome" placeholder="Nome da Atividade ...">
                  <br>
                  <label class="control-label">Selecione o arquivo</label>
                    <input id="arquivo" name="arquivo" type="file" class="file"><br>
                    <input type="date" name="dataEnt"><br><br>
                  <button type="submit" class="btn btn-info">Cadastrar</button>
                </div>
              </div>  
            </div>
            </form>
        </div>
    </div>   
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>