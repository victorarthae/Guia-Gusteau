<!DOCTYPE html>
<!-- saved from url=(0050)http://getbootstrap.com/examples/jumbotron-narrow/ -->
<html lang="en" hola_ext_inject="disabled"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Guia Gusteau</title>

    <!-- Bootstrap core CSS -->
    <link href="./Narrow Jumbotron Template for Bootstrap_files/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./Narrow Jumbotron Template for Bootstrap_files/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./Narrow Jumbotron Template for Bootstrap_files/ie-emulation-modes-warning.js"></script><style type="text/css"></style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    <div class="header clearfix">
        <nav>
            @if(!Auth::check())
                <ul class="nav nav-pills pull-right">
                    <li role="presentation" class="active"><a href="{{ URL::route('login') }}">Login</a></li>
                    <li role="presentation"><a href="{{ URL::route('cadastro') }}">Registrar</a></li>
                </ul>
            @endif
        </nav>
        <h3 class="text-muted"><img src="logo2.png"></h3>
    </div>

    <form action="{!!URL::route('pesquisa')!!}" method="post">
        <div class="jumbotron">
            <h1>O que você quer preparar?</h1>
            <p></p>
            <input name="text" type="text" placeholder="User virgula para separar os ingredientes" class="form-control">
            <p></p>
            <p><input type="submit" value="Pesquisar" class="btn btn-lg btn-success"></p>
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        </div>

    </form>
    <div class="row">
        @foreach($recipes as $r)
            <div class="col-lg-4">
                <img class="img-circle" src="{{  './../../images/'.$r->image  }}" alt="Generic placeholder image" width="140" height="140">
                <h3>{{ $r->title }}</h3>
                <p> {{ $r->description }}</p>
                <p><a class="btn btn-default" href="{{ URL::route('receita', $r->id_recipe) }}" role="button">Ver receita »</a></p>
            </div>
        @endforeach
    </div>

    <footer class="footer">
        <p>© Guia Gusteau 2015</p>
    </footer>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="./Narrow Jumbotron Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>


</body></html>