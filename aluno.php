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
    $loginAluno = $_SESSION['login'];
    
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Página Principal do Aluno</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="funcoes.js"></script>
    <style>
        .navbar{
            height: 2px;
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
                    <li><a class="navbar-brand" <?php "href='aluno.php?login=".$loginAluno."'"?> >SIGES</a></li>
                    <li class="active">
                        <a <?php "href='aluno.php?login=".$loginAluno."'"?>> <i class="fa fa-fw fa-dashboard"></i> Home</a>
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
                            <i class="fa fa-dashboard"></i>  <a href="aluno.html">Home</a>
                        </li>
                    </ol>
                </div>
            </div>
            <a class="btn btn-primary btn-md" href="entrarGrupo.php"> Entrar em um Grupo</a>
            <div class="row">
                <div class="col-lg-10">
                    <div class="table-responsive">
                    <br>
                    <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nome do Grupo</th>
                                    <th>código do grupo</th>
                                    <th class="acoes">Ações</th>
                                </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "select a.nome,a.codigo,a.id from grupo a , aluno b where a.id=b.idGrupo AND login = '$loginAluno'";
                            $result = mysql_query($sql,$con);
                            while($linha= mysql_fetch_array($result)){
                                 echo "<tr><td>".$linha['nome']."</td>".
                                 "<td>".$linha['codigo']."</td>".
                                 "<td> <a class='btn btn-success btn-xs' href= 'grupoAluno.php?id=".$linha['id']. "'>Acessar</a>
                                    <a class='btn btn-danger btn-xs' href='sairGrupo.php?id=".$linha['id']."'>Sair do Grupo</a>
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
</body>
</html>
    <script>
      $('#modalCadGrupo').on('show.bs.modal', function (event) {
         var button = $(event.relatedTarget) // Button that triggered the modal
         var recipient = button.data('whatever') // Extract info from data-* attributes
         // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
         // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
         var modal = $(this)
         modal.find('.modal-title').text('Inscrição em Grupo')
         modal.find('#aluno').val(recipient)
      })
    </script>