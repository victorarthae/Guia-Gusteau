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
    <!--[if lt IE 9]><script src="{{ URL::route('home').'/assets/js/ie8-responsive-file-warning.js' }}"></script><![endif]-->
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
                <li role="presentation"><a href="{{ URL::route('cadastro') }}">Registrar</a></li>
            </ul>
            @else
                <ul class="nav nav-pills pull-right">
                    <li role="presentation"><a href="{{ URL::route('geladeira') }}">Geladeira</a></li>
                    <li role="presentation" class="active"><a href="{{ URL::route('home') }}">Home</a></li>
                    <li role="presentation" class="active"><a href="{{ URL::route('logout') }}">Sair</a></li>
                </ul>
            @endif
        </nav>
        <a href="{{ URL::route('home') }}"><h3 class="text-muted"><img src="{{ URL::route('home').'/logo2.png' }}"></h3></a>
    </div>

    <div class="jumbotron">
        <form action="{!!URL::route('pesquisa')!!}" method="post">
            <input type="text" name="text" placeholder="Pesquisa" class="">
            <input type="submit" value="Pesquisar" class="btn btn-lg btn-success">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        </form>
        <div class="header clearfix">
            <ul class="nav nav-pills pull-left">
                @foreach($all_ingredient as $index => $i)
                    <li><a href="{{ URL::route('pesquisa-remove-id-get', array($ingredients_id, $index)) }}"> x {{ $i }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="header clearfix">
            <h4>Adicionar ingrediente a busca</h4>
            <form action="{!!URL::route('add-ingredient')!!}" method="post">
                <select class="form-control" name="freezer">
                    @foreach($todos_ingredient as $index => $t)
                        <option value="{{ $t->id_ingredient }}">{{ $t->name }}</option>
                    @endforeach
                </select>
                <input type="submit" value="Adicionar a busca" class="btn btn-lg btn-success" style="margin-top: 10px">
                <input type="hidden" name="all_ingredient" id="all_ingredient" value="{{ serialize($all_ingredient) }}" />
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            </form>
        </div>

        @if(!empty($freezer) && Auth::check())
        <div class="header clearfix">
            <h4>Ingredientes da geladeira</h4>
            <form action="{!!URL::route('add-ingredient')!!}" method="post">
                <select class="form-control" name="freezer">
                    @foreach($freezer as $index => $f)
                        <option value="{{ $index }}">{{ $f }}</option>
                    @endforeach
                </select>
                <input type="submit" value="Adicionar a busca" class="btn btn-lg btn-success" style="margin-top: 10px">
                <input type="hidden" name="all_ingredient" id="all_ingredient" value="{{ serialize($all_ingredient) }}" />
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            </form>
        </div>
        @endif
    </div>
    <div class="row">
        @foreach($recipes as $r)
            <div class="col-lg-4">
                <a href="{{ URL::route('receita', $r['recipe']->id_recipe) }}">
                    <img class="img-circle" src="{{ URL::route('home').'/images/'.$r['recipe']->image  }}" alt="Generic placeholder image" width="140" height="140">
                    <h4>{{  $r['recipe']->title }}</h4>
                </a>
                @foreach($r['ingredients'] as $in)
                    - {{ $in }}
                @endforeach
            </div><!-- /.col-lg-4 -->
        @endforeach
    </div>

    <footer class="footer">
        <p>© Guia Gusteau 2015</p>
    </footer>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{ URL::route('home').'/Narrow Jumbotron Template for Bootstrap_files/ie10-viewport-bug-workaround.js' }}"></script>


</body></html>