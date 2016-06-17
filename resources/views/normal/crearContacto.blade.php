@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
    
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo Contacto</div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'contactos.store', 'class' => 'form', 'method'=>'post', 'files'=>true]) !!}
                        <div class="form-group">
                            <label>Nombre</label>
                            {!! Form::input('text', 'nombre', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Apellido 1</label>
                            {!! Form::input('text', 'apellido1', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Apellido 2</label>
                            {!! Form::input('text', 'apellido2', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Fecha de Nacimiento</label>
                             {!! Form::date('fechaNacimiento', \Carbon\Carbon::now(), ['class'=> 'form-control']) !!}
                            
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            {!! Form::email('email', 'email', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Sueldo bruto</label>
                            {!! Form::number('sueldo', '', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Telefono</label>
                            {!! Form::input('text', 'telefono', '', ['class'=> 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label>Agrega una foto</label>
                            {!! Form::file('foto', ['class'=> 'form-control']) !!}
                        </div>
                        {!! Form::hidden('user_id', $userId) !!}

                        <div>
                            {!! Form::submit('Crear',['class' => 'btn btn-success btn-lg']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection