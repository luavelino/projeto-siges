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

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Página Principal do Professor</title>

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
                    <li><a class="navbar-brand" <?php "href='professor?login=".$login."php'"?> >SIGES</a></li>
                    <li class="active">
                        <a <?php "href='professor?login=".$login."php'"?>> <i class="fa fa-fw fa-dashboard"></i> Home</a>
                    </li>
                    <li>
                        <a <?php "href='criarGrupo?login=".$login."php'"?>> <i class="fa fa-fw fa-bar-chart-o"></i> Cadastrar Grupo</a>
                    </li>
                    <li><a href="?deslogar"><i class="glyphicon glyphicon-off"></i> </a>
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
                            <i class="fa fa-dashboard"></i>  <a href="professor.php">Home</a>
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
                                    <th>ID de acesso ao grupo</th>
                                    <th>Nome do Grupo</th>
                                    <th>código do grupo</th>
                                    <th>Quantidade de Alunos</th>
                                    <th class="acoes">Ações</th>
                                </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "select * from grupo where loginProf='$login'";
                            $result = mysql_query($sql,$con);
                            $result2 = mysql_query($sql,$con);
                            $resultado = mysql_fetch_array($result2);
                            $idGrupo = $resultado['id'];
                            $query = "SELECT COUNT(idGrupo) as total FROM aluno where idGrupo = '$idGrupo'";
                            $consulta = mysql_query($query,$con);
                            while($linha=mysql_fetch_array($result)){
                                $qt = mysql_fetch_array($consulta);
                                echo "<tr><td>".$linha['id']."</td>";
                                echo "<td>".$linha['nome']."</td>".
                                 "<td>".$linha['codigo']."</td>".
                                 "<td>".$qt['total']."</td>".
                                 "<td> <a class='btn btn-success btn-xs' href= 'grupo.php?id=".$linha['id']. "'>Acessar</a>
                                    <a class='btn btn-danger btn-xs' href='excluirGrupo.php?id=".$linha['id']."'>Excluir</a>
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