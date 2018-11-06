<?php
    include "conexao.php";
    session_start();
    $UsuarioAtual = $_SESSION['login'];
    $id = $_REQUEST['id'];
    $selecao ="select * from mensagem where id_mensagem = '$id'";
    $res = mysql_query($selecao,$con);

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
    <title>Página de Mensagem</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
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
                    <li><a class="navbar-brand" href="javascript:history.back()">SIGES</a></li>
                    <li class="active">
                        <a href="javascript:history.back()"> <i class="fa fa-fw fa-dashboard"></i> Home</a>
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
                    Mensagens
                  </h1>
              </div>
          </div>
      </div>
  </div> 
  <div class="container content">
    <form action="enviar_mensagem.php" method="POST"> 
    <div class="col-lg-8">
            <div class="input-group">
                <input type="text" name="mensagem" id="mensagem" placeholder="Digite sua mensagem" class="form-control" />
                <span class="input-group-btn">
                    <input type="submit" value="&rang;&rang;" class="btn btn-success">
                </span>
            </div>
        </div>
    </form>
    </div>
    </body>
    </html>
<?php
    if (isset($_POST['env']) && $_POST['env'] == "envMsg") {
        $mensagem = $_POST['mensagem'];
        $login_de = $UsuarioAtual;
        if (mysql_query("insert into mensagem (texto,loginDe,loginPara,data) values('$mensagem','$id','$login_de',NOW())",$con)) {    
        }else{
            echo "erro ao enviar a mensagem";
        }
    }
?>
   
    


