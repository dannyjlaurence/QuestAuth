@extends('layout')

@section('custHeader')
<style>
.col-centered{
	text-align: center;
}

</style>
@stop

@section('content')
<div class="container">
  <!-- Three columns of text below the carousel -->
  <div class="row">
	<div class="container marketing">
	  <!-- Three columns of text below the carousel -->
	  <div class="row">
		@if (Auth::user()->userApplication != null)
			<div class="col-md-4 col-centered">
		      <a href="{{ URL::route("UserApplications.show",Auth::user()->userApplication->id) }}">
		      <i class="fa fa-file-text" style="font-size:200px;"></i>
		      <h2>View Your Application</h2></a>
		    </div><!-- /.col-lg-4 -->
		    <div class="col-md-4 col-centered">
		      <a href="{{ URL::route("UserApplications.edit",Auth::user()->userApplication->id) }}">
		      <i class="fa fa-edit" style="font-size:200px;"></i>
		      <h2>Edit Your Application</h2></a>
		    </div><!-- /.col-lg-4 -->
		    <div class="col-md-4 col-centered">
		      <a href="{{ URL::route("UserApplications.delete",Auth::user()->userApplication->id) }}">
		      <i class="fa fa-trash" style="font-size:200px;"></i>
		      <h2>Delete Your Application</h2></a>
		    </div><!-- /.col-lg-4 -->
		@else
		    <div class="col-xs-12 col-centered">
		      <a href="{{ URL::route("UserApplications.create") }}">
		      <i class="fa fa-sign-in" style="font-size:200px;"></i>
		      <h2>Create Your Application</h2></a>
		    </div><!-- /.col-lg-4 -->
		@endif
	  </div><!-- /.row -->
	</div>
  </div><!-- /.row -->
</div>
@stop
