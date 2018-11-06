<?php
    session_start();
    $login = $_SESSION['login'];    

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Página Principal</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar{
            height: 2px;
        }
        .btn-md{
            background-color: red;
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
                    <li><a class="navbar-brand" <?php "href='aluno.php?login=".$login."'"?> >SIGES</a></li>
                    <li class="active">
                        <a <?php "href='aluno.php?login=".$login."'"?>> <i class="fa fa-fw fa-dashboard"></i> Home</a>
                    </li>
                    <li><a href='logout.php'><i class="glyphicon glyphicon-off"></i></a></li>
                </ul>
        </div>
    </nav>
    <div id="page-wrapper">
        <div class="container">  
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                    <br><br>
                    Home
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="aluno.html">Grupos</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <form class="form-horizontal" action="inscricaoGrupo.php" method="POST">
        <div class="form-group">
            <label class="col-md-4 control-label" for="id">ID do Grupo</label>
            <div class="col-md-6">
                <div class="input-group">
                    <input id="id" name="id" class="form-control" placeholder="Digite o ID do grupo" type="text" required="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="codigo">Codigo do grupo</label>
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" name="codigo" class="form-control" placeholder="Digite o código do grupo" required="">
                </div>
            </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="Entrar"></label>
          <div class="col-md-8">
            <button id="entrar" name="entrar" class="btn btn-success" type="submit">Entrar</button>
            <button id="Cancelar" name="Cancelar" class="btn btn-danger">Cancelar</button>
          </div>
        </div>
    </form>
</body>
</html>