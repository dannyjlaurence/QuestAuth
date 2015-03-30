@extends('layout')

@section('title')
Login
@stop

@section('custHeader')
<style>
    .form-signin {
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
      margin-top: 30px;
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
      margin-bottom: 10px;
    }
    .form-signin .checkbox {
      font-weight: normal;
    }
    .form-signin .form-control {
      position: relative;
      height: auto;
      -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
              box-sizing: border-box;
      padding: 10px;
      font-size: 16px;
    }
    .form-signin .form-control:focus {
      z-index: 2;
    }
    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
</style>
@stop

@section('content')
    <div class="row">
        {{ Form::open([
            'action' => 'UserController@loginAction',
            'class' => 'form-signin'
        ]) }}
        <h2 class="form-signin-heading">Please sign in</h2>
            {{ Form::label("username", "Username") }}
            {{ Form::text("username", Input::old("username"), [
                'placeholder' => 'Username',
                'class' => 'form-control'
            ]) }}
            {{ Form::label("password", "Password") }}
            {{ Form::password("password", [
                'placeholder' => '●●●●●●●●●●',
                'class' => 'form-control'
            ]) }}
            @if ($error = $errors->first("password"))
                <div class="error">
                    {{ $error }}
                </div>
            @endif
            {{ Form::submit("Login",['class' => 'btn btn-lg btn-primary btn-block']) }}
        {{ Form::close() }}
    </div>
@stop
