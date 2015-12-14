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
    <link href="{{ URL::route('home').'/Narrow Jumbotron Template for Bootstrap_files/bootstrap.min.css' }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::route('home').'/Narrow Jumbotron Template for Bootstrap_files/jumbotron-narrow.css' }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ URL::route('home').'/Narrow Jumbotron Template for Bootstrap_files/ie-emulation-modes-warning.js' }}"></script><style type="text/css"></style>

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
                    <li role="presentation" class="active"><a href="{{ URL::route('home') }}">Home</a></li>
                    <li role="presentation"><a href="{{ URL::route('login') }}">Login</a></li>
                </ul>
            @else
                <ul class="nav nav-pills pull-right">
                    <li role="presentation" class="active"><a href="{{ URL::route('logout') }}">Sair</a></li>
                </ul>
            @endif
        </nav>
        <a href="{{ URL::route('home') }}"><h3 class="text-muted"><img src="{{ URL::route('home').'/logo2.png' }}"></h3></a>
    </div>

    <div class="jumbotron">
        @if(Auth::check())
            <h1>Geladeira</h1>
            <div>
                <form action="{!!URL::route('geladeira-add')!!}" method="post">
                    <select class="form-control" name="id_ingredient">
                        @foreach($all_ingredient as $index => $all)
                            @if(!in_array($all->name, $ingredient))
                                <option value="{{ $all->id_ingredient }}">{{ $all->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <input type="submit" value="Adicionar a geladeira" class="btn btn-lg btn-success" style="margin-top: 10px">
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                </form>
            </div>
            <div>
                <ul  class="nav nav-pills pull-left">
                    @foreach($ingredient as $index => $i)
                        <li><a href="{{ URL::route('geladeira-del', $index) }}">x {{ $i }} </a></li>
                    @endforeach
                </ul>
            </div>
            <div style="margin-top: 50px">
                @if(count($ingredient) > 0)
                    <a href="{{ URL::route('pesquisa-geladeira') }}"><input type="submit" value="Pesquisar" class="btn btn-lg btn-success"></a>
                @endif
            </div>
        @else
            <h1>Voce nao esta logado</h1>
        @endif
    </div>


    <footer class="footer">
        <p>© Guia Gusteau 2015</p>
    </footer>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{ URL::route('home').'/Narrow Jumbotron Template for Bootstrap_files/ie10-viewport-bug-workaround.js' }}"></script>


</body></html>