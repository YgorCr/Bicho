<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="José Everaldo, Ygor Crispim">

    <title>Bicho</title>

    <!-- Bootstrap core CSS -->
    <link href="static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="static/css/fifatickets.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="?a=home">Bicho</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li 
              <?php if($ac=="home" || $ac=="partidas"){ ?> class="active" <?php } ?>
               ><a href="?a=home">Home</a></li>

            <li 
              <?php if($ac=="jogador"){ ?> class="active" <?php } ?>
               ><a href="?a=jogador"> <?php if($jogador) echo "Minha conta"; else echo "Cadastre-se"; ?> </a></li>

            <li 
              <?php if($ac=="sobre"){ ?> class="active" <?php } ?>
               ><a href="?a=sobre">Sobre</a></li>

            <li 
              <?php if($ac=="jogador.login"){ ?> class="active" <?php } ?>
               >

               <?php if(!$jogador){ ?>
                <a href="?a=jogador.login">Login</a>
              <?php } else { ?>
                <a href="#"><?php echo $jogador->get("nome"); ?></a>
              <?php } ?>

             </li>

             <?php if($jogador) { ?>
             <li>
              <a href="?a=logout">Sair</a>
             </li>
             <?php } ?>

          </ul>

          <form class="navbar-form navbar-right" role="search" action="">
            <div class="form-group">
              <input type="hidden" name="a" value="buscar"/>
              <input type="hidden" name="by" value="nome" />
              <input type="text" class="form-control" placeholder="Buscar resultados" name="q">
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
          </form>

        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container" id="container">
