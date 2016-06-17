@extends('app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Formulario de registro</div>
 
                <div class="panel-body">
                    {!! Form::open(['route' => 'auth/register', 'class' => 'form']) !!}

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
                            <label>Tipo de usuario</label>
                            {!! Form::radio('rolId', '0', true) !!}<label for="rolId">Normal</label>
                            {!! Form::radio('rolId', '1') !!}<label for="rolId">Administrador</label>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            {!! Form::email('email', 'email', ['class'=> 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            {!! Form::password('password', ['class'=> 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label>Password confirmation</label>
                            {!! Form::password('password_confirmation', ['class'=> 'form-control']) !!}
                        </div>

                        <div>
                            {!! Form::submit('Enviar',['class' => 'btn btn-success']) !!}
                        </div>
                        <a href="{{route('auth/login')}}">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection