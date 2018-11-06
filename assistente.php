<?php
    include "conexao.php";
    session_start();
    if (!isset ($_SESSION['logado'])) {
        session_destroy();
        echo "<script language='javascript' type='text/javascript'>alert('Voce não está logado!');window.location.href='index.php';</script>";
    }
    if (isset($_GET['deslogar'])) {
        session_destroy();
        header('location:index.php');
    }
    $login = $_SESSION['login'];
    $select = "select id from assistente where login = '$login'";
    $query = mysql_query($select,$con);
    $array = mysql_fetch_array($query);
    $idAssis = $array['id'];
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
                    Home
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.html">Home</a>
                        </li>
                    </ol>
                </div>
            </div>  
            <div class="row">
                <div class="col-lg-10">
                    <div class="table-responsive">
                    <br>
                    <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nome do Grupo</th>
                                    <th>código do grupo</th>
                                    <th>Quantidade de Alunos</th>
                                    <th class="acoes">Ações</th>
                                </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "select * from grupo where idAssis = '$idAssis'";
                            $result = mysql_query($sql,$con);
                            while($linha= mysql_fetch_array($result)){
                                 echo "<tr><td>".$linha['nome']."</td>".
                                 "<td>".$linha['codigo']."</td>".
                                 "<td>"."QT alunos"."</td>".
                                 "<td> <a class='btn btn-success btn-xs' href= 'grupoAssistente.php?id=".$linha['id']. "'>Visualizar</a>
                                </td></tr>";
                                    
                            }
                        ?>
                      </tbody>
                    </table>
                    </div>
                </div>       
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</body>
</html>
