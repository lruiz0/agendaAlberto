@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
    
            <div class="panel panel-default">
                <div class="panel-heading">Modificar contacto</div>
                <div class="panel-body">

                    {!! Form::open(['route' => ['contactos.update', $contacto->id], 'class' => 'form', 'method'=>'patch', 'files'=>true]) !!}
                        <div class="form-group">
                            <label>Nombre</label>
                            {!! Form::input('text', 'nombre', $contacto->nombre, ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Apellido 1</label>
                            {!! Form::input('text', 'apellido1', $contacto->apellido1, ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Apellido 2</label>
                            {!! Form::input('text', 'apellido2', $contacto->apellido2, ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Fecha de Nacimiento</label>
                             {!! Form::date('fechaNacimiento', $contacto->fechaNacimiento, ['class'=> 'form-control']) !!}
                            
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            {!! Form::email('email', $contacto->email, ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Sueldo bruto</label>
                            {!! Form::number('sueldo', $contacto->sueldoBruto, ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Telefono</label>
                            {!! Form::input('text', 'telefono', $contacto->telefono, ['class'=> 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label>Modificar imagen</label>
                            {!! Form::file('foto', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Imagen Actual</label>
                           <img class="media-object" onerror="this.src='{{asset('assets/imagenes/empty-profile2.png')}}'" src="data:image/{{$contacto->tipoImagen}};base64,{{$contacto->foto}}" alt="Generic placeholder image">
                        </div>
                   

                        <div>
                            {!! Form::submit('Modificar',['class' => 'btn btn-success btn-lg']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection