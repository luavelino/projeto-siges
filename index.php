<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Página Principal</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login{
            position: absolute;
            left:40%;
            top:40%;
        }
        .form-control{
            width: 300px;
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
        <a class="navbar-brand" href="index.php">SIGES</a>
        <a class="navbar-brand" href="index.php">Home </a>
        <a class="navbar-brand" href="cadastro.html">Cadastro</a>
    </div>
    </nav>
    <section>
    <div class="login">
        <form action="UserControl.php" method="post" name="login_form" class="form_login">
            <input type="text" class="form-control" name="login" placeholder="Usuario" required="" autofocus=""/><br>
            <input type="password" class="form-control" name="senha" placeholder="Senha" required=""/><br>
            <button class="btn btn-lg btn-primaty btn-block" name="Submit" value="Submit " type="submit">Login</button>
                    
        </form>
    </div>
    </section>
</body>
</html>
