@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

               <div class="formLogin">

                   
                   {!! Form::open(['route' => 'auth/login', 'class' => 'form']) !!}
                   <h3>Login</h3>
                            <div class="form-group">
                                <label>Email</label>
                                {!! Form::email('email', '', ['class'=> 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                {!! Form::password('password', ['class'=> 'form-control']) !!}
                            </div>
                            <div class="checkbox">
                                <label><input name="remember" type="checkbox"> Remember me</label>
                            </div>
                            <div>                            
                                {!! Form::submit('login',['class' => 'btn btn-primary']) !!}
                            </div>
                            <a href="{{route('auth/register')}}">Registrate</a>
                        {!! Form::close() !!}
               </div>
                        
                 
        </div>
    </div>
@endsection