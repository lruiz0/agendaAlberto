@extends('app')
@section('content')
    <div class="container-fluid">

            
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

            @if($contactos->isEmpty() || is_null($contactos))
				<div class="bienvenida">
		
						 <h1>Bienvenido a tu agenda</h1>
						 
					  	<p>Tu lista de contactos está vacía, ¿Por qué no agregas un nuevo contacto?</p>
					  	{!! Html::image('assets/imagenes/nuevoContacto.png') !!}
					  	{!!link_to_route('nuevoContacto', 'Agregar contacto', ['userId'=>$userId]) !!}
				
				 
				</div>
            @else
                <h1>{!! Html::image('assets/imagenes/contacts2.png') !!} Tus contactos</h1>
                <hr>
                <div class="listaContactos">
                {!! Form::open(['route' => ['buscarContacto',  Auth::user()->id], 'class' => 'form', 'method'=>'get']) !!}
				<div class="row"> 
					<div class="col-xs-6 col-xs-offset-6">
				    <div class="input-group">
				    {!! Form::input('text', 'nombre', 'Buscar por nombre', ['class'=> 'form-control']) !!}
				      <span class="input-group-btn">
				        {!! Form::submit('Buscar',['class' => 'btn btn-success']) !!}
				      </span>
				    </div><!-- /input-group -->
				  </div><!-- /.col-lg-6 -->
				</div>
				{!!Form::close()!!}
                	@foreach($contactos as $contacto)

                	<div class="media">
					  <a class="media-left" href="#">
					    <img class="media-object" onerror="this.src='{{asset('assets/imagenes/empty-profile2.png')}}'" src="data:image/{{$contacto->tipoImagen}};base64,{{$contacto->foto}}" alt="iagen de contacto">
					  </a>
					  <div class="media-body">
					    <h3 class="media-heading">{{$contacto->nombre}} {{$contacto->apellido1}} {{$contacto->apellido2}}</h3>
					    <p><label><span class="glyphicon glyphicon-envelope"></span> Email: </label> {{$contacto->email}}</p>
					    <p><label><span class="glyphicon glyphicon-earphone"></span> Telefono: </label> {{$contacto->telefono}}</p>
					  </div>
					</div>
                	@endforeach
                </div>
           
            @endif
               
               
            </div>
        </div>
    </div>
@endsection