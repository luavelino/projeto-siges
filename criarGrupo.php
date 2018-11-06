<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Página de Criação de Grupo</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar{
            height: 2px;
        }
    </style>

</head>

<body>
	<!-- COMEÇO DO MENU-->
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">SIGES</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="home.php"><i class="fa fa-fw fa-dashboard"></i> Home</a>
                    </li>
                    <li class="active">
                        <a href="cadastrarGrupo.php"><i class="fa fa-fw fa-bar-chart-o"></i> Cadastrar Grupo</a>
                    </li>
                </ul>
        </div>
    </nav>
	<!-- FIM DO MENU-->
    <div id="page-wrapper">

            <div class="container">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <br><br>
                            Grupos
                        </h1>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-lg-10">
                        <form class="form-horizontal" method="post" action="cadastrarGrupo.php" name="frm">
                            <fieldset>

                    <!-- Form Name -->
                            <legend>Criar um grupo</legend>

                            <!-- Appended Input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="nome">Nomeie o grupo</label>
                              <div class="col-md-6">
                                <div class="input-group">
                                  <input id="nome" name="nome" class="form-control" placeholder="nome do grupo" type="text" required="">

                                </div>
                              </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="codigo">Código de Acesso</label>  
                              <div class="col-md-6">
                              <input id="codigo" name="codigo" type="text" placeholder="Digite o código de acesso do grupo" class="form-control input-md">
                                
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="tipoGrupo">Tipo de Grupo</label>  
                              <div class="col-md-6">
                              <select name="tipoGrupo">
                               <option>Selecione o tipo do grupo</option>
                                <option value="1° ano EM">1º ano do Ensino médio</option>
                                <option value="2° ano EM">2º ano do Ensino médio</option>
                                <option value="3° ano EM">3º ano do Ensino médio</option>
                                <option value="Técnico">Ensino Técnico</option>
                                <option value="Superior">Ensino Superior</option>                      
                              </select>  
                              </div>
                            </div>
                            <!-- Button (Double) -->
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="Cadastrar"></label>
                              <div class="col-md-8">
                                <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="submit">Cadastrar</button>
                                <button id="Cancelar" name="Cancelar" class="btn btn-danger">Cancelar</button>
                              </div>
                            </div>

                            </fieldset>
                            </form>

                                </div>
                            </div>
                        
