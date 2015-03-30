@extends('layout')

@section('custHeader')
<style>
.offset{
	margin-top:45px;
	background-color:#222;
}
body > .container {
	margin-top:70px;
}
.col-centered{
	text-align: center;
}
.btn {
	width:100%;
}
</style>
@stop

@section('content')
<div class="container offset-container">
  <!-- Three columns of text below the carousel -->
	<?php $i = 0; ?>

	<div class="navbar navbar-fixed-top offset" role="navigation">
      <div class="container" style="margin-top: 10px;">
        <div class="navbar-collapse collapse">
			<div class="row">
				<div class="col-xs-4 col-centered col-xs-offset-4">
					<a class="btn btn-default btn-sm" href="{{ URL::route("UserApplications.edit",Auth::user()->userApplication->id) }}">
					Edit
		  			</a>
				</div>
			</div>
        </div>
      </div>
    </div>

    @if($userapplication->submitted == true)
    	<div class="row">
    		<div class="col-xs-12">
    			<table class="table">
    				<tr>
    					<td class="danger">This application has been submitted. You have untill {{ $userapplication->application()->get()[0]->appDueDate() }} to unsubmit it.</td>
    				</tr>
    			</table>
    		</div>
    	</div>
    @endif


    @foreach($userapplication->questions() as $question)
    	<div class="row">
		  <div class="col-xs-6">
		  	<h4>
		  	{{ $i + 1 . ".) " . $question->question_html }}
		  	</h4>
		  </div>
		  <div class="col-xs-6">
		  	<p>
		  	{{ $userapplication->answerForQuestion($question->id) }}
		  	</p>
		  </div><!-- /.col-lg-4 -->
    	</div><!-- /.row -->
    	<hr/>
    	<?php $i = $i + 1; ?>
   	@endforeach
</div>
@stop
