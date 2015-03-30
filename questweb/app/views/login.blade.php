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
</style>
@stop

@section('content')
    <div class="row">
        {{ Form::open([
            'action' => 'UserController@preLoginAction',
            'class' => 'form-signin'
        ]) }}
        <h2 class="form-signin-heading">Log into QUESTWeb</h2>
        {{ Form::submit("UMD Login",['class' => 'btn btn-lg btn-primary btn-block btn-danger', 'name' => 'umdlogin']) }}
        <a class="btn btn-lg btn-primary btn-block btn-warning" href="{{ URL::route("internalLogin") }}">Alumni Login</a>
        {{ Form::close() }}
    </div>
@stop
