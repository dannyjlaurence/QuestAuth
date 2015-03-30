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
		<div class="col-xs-4 col-centered">
		  <a href="{{ URL::route("admin.application") }}">
		  <i class="fa fa-file" style="font-size:200px;"></i>
		  <h2>Application Management</h2></a>
		</div><!-- /.col-lg-4 -->
		<div class="col-xs-4 col-centered">
		  <a href="{{ URL::route("admin.user") }}">
		  <i class="fa fa-users" style="font-size:200px;"></i>
		  <h2>User Management</h2></a>
		</div><!-- /.col-lg-4 -->
		<div class="col-xs-4 col-centered">
		  <a href="{{ URL::route("admin.reader") }}">
		  <i class="fa fa-book" style="font-size:200px;"></i>
		  <h2>Reader Management</h2></a>
		</div><!-- /.col-lg-4 -->
	</div>
	<div class="row">
		<div class="col-xs-4 col-centered">
		  <a href="{{ URL::route("admin.anaylsis") }}">
		  <i class="fa fa-book" style="font-size:200px;"></i>
		  <h2>Analysis</h2></a>
		</div><!-- /.col-lg-4 -->
		<div class="col-xs-4 col-centered">
		  <a href="{{ URL::route("admin.interviewer") }}">
		  <i class="fa fa-calendar" style="font-size:200px;"></i>
		  <h2>Interview Management</h2></a>
		</div><!-- /.col-lg-4 -->
	</div>
</div>
@stop