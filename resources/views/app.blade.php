
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    {!!Html::style('assets/css/bootstrap.min.css')!!}
    {!!Html::style('assets/css/agenda.css')!!}
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Covered+By+Your+Grace' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
     	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@if (Auth::guest())
<h1>{!! Html::image('assets/imagenes/agenda.png') !!}My<span>Agenda<span>.com</h1>
@else

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
		    <div class="navbar-header">
		        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			    <span class="sr-only">Toggle Navigation</span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Laravel</a>
		    </div>
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		        <ul class="nav navbar-nav ">
			    	<li><a href="/">Home</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				    <li><a href="{{route('nuevoContacto', [Auth::user()->id])}}"><span class='glyphicon glyphicon-plus-sign'></span>  Agregar Contacto</a></li>
		                <p class="navbar-text">
		                
		                    Has entrado como <span>{{Auth::user()->nombre}} {{Auth::user()->apellido1}} {{Auth::user()->apellido2}}</span>
		                    @if(Auth::user()->rolId==1) 
								(Administrador)
		                    @endif
		                </p>
		                <li><a href="{{route('auth/logout')}}"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Cerrar Sesión</a></li>
		                
			        
				</ul>
			</div>
		</div>
	</nav>
	@endif
    <div class="container">
               @if (Session::has('errors'))
		    <div class="alert alert-danger" role="alert">
			<ul>
	            <strong>Oops! Algo fue mal : </strong>
			    @foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

		 @if (session('status'))
		    <div class="alert alert-success" role="alert">

		       <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>  {{ session('status') }}
		       
		    </div>
			@endif

			 @if (session('errorCustom'))
		    <div class="alert alert-danger" role="alert">

		         {{ session('errorCustom') }}
		       
		    </div>
			@endif

		
    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    @yield('content')
    <!-- Scripts -->

    {!!Html::script('assets/js/bootstrap.min.js')!!}
</body>
</html>