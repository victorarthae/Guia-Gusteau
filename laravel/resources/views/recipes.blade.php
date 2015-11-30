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
    <link href="./../Narrow Jumbotron Template for Bootstrap_files/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./../Narrow Jumbotron Template for Bootstrap_files/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./../Narrow Jumbotron Template for Bootstrap_files/ie-emulation-modes-warning.js"></script><style type="text/css"></style>

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
            <ul class="nav nav-pills pull-right">
                <li role="presentation" class="active"><a href="{{ URL::route('home') }}">Home</a></li>
                <li role="presentation"><a href="{{ URL::route('login') }}">Login</a></li>
            </ul>
        </nav>
        <h3 class="text-muted"><img src="./../logo2.png"></h3>
    </div>

    <div class="">
        <h2>{{ $recipe->title }}</h2>
        <p></p>
        <p><img align="left" class="img-thumbnail"  src="{{ './../../images/'.$recipe->image }}" data-holder-rendered="true" style="width: 200px; height: 200px; "></p>
        <p><b> Ingredientes necessarios:</b></p>
        <p>
        <ul>
            @foreach($ingredient as $i)
                <li> {{ $i->name }}</li>
            @endforeach
        </ul>
        </p>
        <p>
            <b>Modo de preparo:</b> {{ $recipe->description }}
        </p>

    </div>
    <footer class="footer">
        <p>© Guia Gusteau 2015</p>
    </footer>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="./../Narrow Jumbotron Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>


</body></html>