@extends('layout')

@section('custHeader')
<style>
body >.container{
	margin-top:50px;
}
.offset{
	margin-top:50px;
}
.black {
	background-color:#222;
}
.col-centered{
	text-align: center;
}
.btn {
	width:100%;
}
.hidden{
	display:none;
}

label {
  width:100%;
}

</style>
@stop

@section('content')

<div class="container">
	{{ Form::open(array('route' => array('UserApplications.update', $userapplication->id),'method' => 'put')) }}

		<div class="navbar navbar-fixed-top offset black" role="navigation">
		  <div class="container" style="margin-top: 10px;">
		    <div class="navbar-collapse collapse">
				<div class="row">
					<div class="col-xs-4 col-centered">
						<a class="btn btn-default btn-sm" href="{{ URL::route("UserApplications.index") }}">
						Cancel
						</a>
					</div>
					<div class="col-xs-4 col-centered">
						<input class="btn btn-default btn-sm" type="submit" name="save" value="Save" />
					</div>
					@if($userapplication->submitted == true)
						<div class="col-xs-4 col-centered">
							<input class="btn btn-default btn-sm" type="submit" name="submit" value="Unsubmit" />
						</div>
					@else
						<div class="col-xs-4 col-centered">
							<input class="btn btn-default btn-sm" type="submit" name="submit" value="Submit" />
						</div>
					@endif
				</div>
		    </div>
		  </div>
		</div>
		<div class="row"> 
	      <table class="table">
	        <tr class="message">
	          
	        </tr>
	      </table>
	    </div>

		<div class="row">
			<div class="col-xs-12">
				<h2>Thanks, and Good Luck From QUEST!</h2>
				<p>Thank you for your interest in the QUEST Honors Program! We are glad that you are applying to be a part of the program.</p>
				<br/>
				<p>Please fill out the application below. We recommend that you compose your answers in a word processing program and copy and paste them into this form. Press "Save" to store your answers in our database, and once you are done with the application, please be sure to click the "Submit" button. After submitting, you will be able to edit your answers up until the deadline.</p>
				<br/>
				<p>If you have questions as you fill out the application, please contact Jessica Macklin at jmacklin@rhsmith.umd.edu. This application will be available until Friday, February 13th at 11:59pm.</p>
			</p>
		</div>
		<br/>

		<?php $i = 0; ?>
	    @foreach($userapplication->questions() as $question)
	    	<div class="row">
			  <div class="col-xs-12">
			  	<div class="row">
			  		<h4>{{ $i + 1 . ".) " . $question->question_html }}</h4>
			  	</div>
			  	<div class="row">
			  		{{ Form::hidden('answer_' . $i . '_question', $question->id);}}

				  	@if(stripos($question->question_html, "preferred cohort"))
				  		<div class="col-xs-6">
				  			<img class='img-responsive img-thumbnail' style='text-align:center;' src='/cohortdiagram.png'>
				  		</div>
				  		<div class="col-xs-6">
						  	<div class="radio">
		  						<label>
		  							<h5>
						  			<input type="radio" id="{{'answer_' . $i}}" name="{{'answer_' . $i}}" value="25 only" {{$userapplication->answerForQuestion($question->id) == "25 only" ? 'checked' : ''}}/>
						  			I prefer cohort 25 (Fall 2015) only
						  			</h5>
					  			</label>
					  		</div>
					  		<div class="radio">
		  						<label>
		  							<h5>
					  				<input type="radio" id="{{'answer_' . $i}}" name="{{'answer_' . $i}}" value="26 only" {{$userapplication->answerForQuestion($question->id) == "26 only" ? 'checked' : ''}}/>
					  				I prefer cohort 26 (Spring 2016) only
					  				</h5>
					  			</label>
					  		</div>
					  		<div class="radio">
		  						<label>
		  							<h5>
						  			<input type="radio" id="{{'answer_' . $i}}" name="{{'answer_' . $i}}" value="25 and" {{$userapplication->answerForQuestion($question->id) == "25 and" ? 'checked' : ''}}/>
						  			 I prefer cohort 25, but would join cohort 26
						  			</h5>
					  			</label>
					  		</div>
					  		<div class="radio">
		  						<label>
		  							<h5>
					  				<input type="radio" id="{{'answer_' . $i}}" name="{{'answer_' . $i}}" value="26 and" {{$userapplication->answerForQuestion($question->id) == "26 and" ? 'checked' : ''}}/>
					  				 I prefer cohort 26, but would join cohort 25
					  				</h5>
					  			</label>
					  		</div>
					  		<div class="radio">
		  						<label>
		  							<h5>
					  				<input type="radio" id="{{'answer_' . $i}}" name="{{'answer_' . $i}}" value="No" {{$userapplication->answerForQuestion($question->id) == "No" ? 'checked' : ''}}/>
					  				 No Preference
					  				</h5>
					  			</label>
					  		</div>
				  		</div>
				  	@elseif(stripos($question->question_html, "did you learn about"))
				  		<label style="text-align:left;">
			              <input id="{{'answer_' . $i}}[]" name="{{'answer_' . $i}}[]" value="Word of Mouth" type="checkbox" {{stripos($userapplication->answerForQuestion($question->id),"ord of Mouth") ? 'checked' : ''}}> Word of Mouth</input>
			            </label>
			            <label style="text-align:left;">
			              <input id="{{'answer_' . $i}}[]" name="{{'answer_' . $i}}[]" value="Talented Student Email" type="checkbox" {{stripos($userapplication->answerForQuestion($question->id),"alented Student Email") ? 'checked' : ''}}> Talented Student Email</input>
			            </label>
			            <label style="text-align:left;">
			              <input id="{{'answer_' . $i}}[]" name="{{'answer_' . $i}}[]" value="Other Email" type="checkbox" {{stripos($userapplication->answerForQuestion($question->id),"ther Email") ? 'checked' : ''}}> Other Email</input>
			            </label>
			            <label style="text-align:left;">
			              <input id="{{'answer_' . $i}}[]" name="{{'answer_' . $i}}[]" value="Advisor" type="checkbox" {{stripos($userapplication->answerForQuestion($question->id),"dvisor") ? 'checked' : ''}}> Advisor/Professor. Please list their name below</input>
			            </label>
			            <input class="form-control" name="answer_{{$i}}[]" type="text" value="{{$userapplication->answerForAdvisorQuestion($question->id)}}" style="background-image: none; background-position: 0% 0%; background-repeat: repeat;">
			            <label style="text-align:left;">
			              <input id="{{'answer_' . $i}}[]" name="{{'answer_' . $i}}[]" value="First Look Fair/Engineering Picnic/General Tabling" type="checkbox" {{stripos($userapplication->answerForQuestion($question->id),"irst Look Fair/Engineering Picnic/General Tabling") ? 'checked' : ''}}> First Look Fair/Engineering Picnic/General Tabling</input>
			            </label>
			            <label style="text-align:left;">
			              <input id="{{'answer_' . $i}}[]" name="{{'answer_' . $i}}[]" value="Facebook/Social Media" type="checkbox" {{stripos($userapplication->answerForQuestion($question->id),"acebook/Social Media") ? 'checked' : ''}}> Facebook/Social Media</input>
			            </label>
			            <label style="text-align:left;">
			              <input id="{{'answer_' . $i}}[]" name="{{'answer_' . $i}}[]" value="Speaker in Class" type="checkbox" {{stripos($userapplication->answerForQuestion($question->id),"peaker in Class") ? 'checked' : ''}}> Speaker in Class</input>
			            </label>
			            <label style="text-align:left;">
			              <input id="{{'answer_' . $i}}[]" name="{{'answer_' . $i}}[]" value="Friend/Sibling in QUEST" type="checkbox" {{stripos($userapplication->answerForQuestion($question->id),"riend/Sibling in QUEST") ? 'checked' : ''}}> Friend/Sibling in QUEST</input>
			            </label>
			            <label style="text-align:left;">
			              <input id="{{'answer_' . $i}}[]" name="{{'answer_' . $i}}[]" value="Other" type="checkbox" {{stripos($userapplication->answerForQuestion($question->id),"ther") ? 'checked' : ''}}> Other</input>
			            </label>
			            <input class="form-control" name="answer_{{$i}}[]" type="text" value="{{$userapplication->answerForOtherQuestion($question->id)}}" style="background-image: none; background-position: 0% 0%; background-repeat: repeat;">

			        
			        @elseif(stripos($question->question_html, "we will ask for a recommendation"))
			        	{{ Form::text('answer_' . $i,$userapplication->answerForQuestion($question->id),array('class' => 'form-control')) }}

					@elseif(stripos($question->question_html, "involved while participating in QUEST"))
						<label style="text-align:left;">
			              <input id="{{'answer_' . $i}}[]" name="{{'answer_' . $i}}[]" value="QUESTRecruiting Liaison – a student who applies to participate on the recruiting committee. This student helps to coordinate and execute all recruitment efforts." type="checkbox" {{stripos($userapplication->answerForQuestion($question->id),"ecruiting Liaison – a student who applies to participate on the recruiting committee. This student helps to coordinate and execute all recruitment efforts.") ? 'checked' : ''}}> Recruiting Liaison – a student who applies to participate on the recruiting committee. This student helps to coordinate and execute all recruitment efforts.</input>
			            </label>
			            <label style="text-align:left;">
			              <input id="{{'answer_' . $i}}[]" name="{{'answer_' . $i}}[]" value="Curriculum Review Committee (CRC) Member – a student who applies to participate in the curriculum development and review process for the program." type="checkbox" {{stripos($userapplication->answerForQuestion($question->id),"urriculum Review Committee Member – a student who applies to participate in the curriculum development and review process for the program.") ? 'checked' : ''}}> Curriculum Review Committee Member – a student who applies to participate in the curriculum development and review process for the program.</input>
			            </label>
			            <label style="text-align:left;">
			              <input id="{{'answer_' . $i}}[]" name="{{'answer_' . $i}}[]" value="QUESTPress Editor/Writer – a student who applies to be a writer and/or editor for the QUEST newsletter, QUESTPress.  This student volunteers to join a team of writers to interview and write small pieces about QUEST news and current events." type="checkbox" {{stripos($userapplication->answerForQuestion($question->id),"UESTPress Editor/Writer – a student who applies to be a writer and/or editor for the QUEST newslet ter, QUESTPress.  This student volunteers to join a team of writers to interview and write small pieces about QUEST news and current events.") ? 'checked' : ''}}> QUESTPress Editor/Writer – a student who applies to be a writer and/or editor for the QUEST newslet ter, QUESTPress.  This student volunteers to join a team of writers to interview and write small pieces about QUEST news and current events.</input>
			            </label>
			            <label style="text-align:left;">
			              <input id="{{'answer_' . $i}}[]" name="{{'answer_' . $i}}[]" value="Quest Student Organization (QSO) Member – a student who participates on the QSO baord. This student acts as a representative of the entire QUEST community, plans and coordinates community events, and offers valuable insight to QUEST curriculum, programming, and alumni initiatives from the student perspective." type="checkbox" {{stripos($userapplication->answerForQuestion($question->id),"uest Student Organization (QSO) Member – a student who applies to be a QSO officer. This student acts as a representative of the entire QUEST community, plans and coordinates community events, and offers valuable insight to QUEST curriculum, programming, and alumni initiatives from the student perspective.") ? 'checked' : ''}}> Quest Student Organization (QSO) Member – a student who applies to be a QSO officer. This student acts as a representative of the entire QUEST community, plans and coordinates community events, and offers valuable insight to QUEST curriculum, programming, and alumni initiatives from the student perspective.</input>
			            </label>
			        @elseif(stripos($question->question_html, "creation phase of a 190H"))
			        	<h5>You have <div id="{{'answer_' . $i}}_count" style="display:inline;">250</div> words left</h5>
					  	{{ Form::textarea('answer_' . $i,$userapplication->answerForQuestion($question->id),array('class' => 'form-control simply-count-250')) }}
				  	@else
				  		<h5>You have <div id="{{'answer_' . $i}}_count" style="display:inline;">100</div> words left</h5>
					  	{{ Form::textarea('answer_' . $i,$userapplication->answerForQuestion($question->id),array('class' => 'form-control simply-count-100')) }}
				  	@endif
			  	</div>
			  </div><!-- /.col-lg-4 -->
	    	</div><!-- /.row -->
	    	<?php $i = $i + 1; ?>
	   	@endforeach

	   	<hr/>
	   	<div class="row"> 
	      <table class="table">
	        <tr class="message">
	          
	        </tr>
	      </table>
	    </div>
		<div class="row">
			<div class="col-xs-4 col-centered">
				<a class="btn btn-primary btn-lg" href="{{ URL::route("UserApplications.index") }}">
				Cancel
				</a>
			</div>
			<div class="col-xs-4 col-centered">
				<input class="btn btn-primary btn-lg" type="submit" name="save" value="Save" />
			</div>
			@if($userapplication->submitted == true)
				<div class="col-xs-4 col-centered">
					<input class="btn btn-primary btn-lg" type="submit" name="submit" value="Unsubmit" />
				</div>
			@else
				<div class="col-xs-4 col-centered">
					<input class="btn btn-primary btn-lg" type="submit" name="submit" value="Submit" />
				</div>
			@endif
		</div>

	{{ Form::close() }}

</div>
@stop

@section('js')
<script src="/bootstrap/js/jquery.simplyCountable.js"></script>
<script>
$(document).ready(function(){

	$("form").submit(function(e) {
		var val = $("input[type=submit][clicked=true]").val()
		console.log(val);
		if(val == "Submit"){
			var isValid = true;
	        $('textarea').each(function() {
	            if ($.trim($(this).val()) == '') {
	                isValid = false;
	            }
	        });
	        if (!isValid){
		        console.log("End:" + isValid);
	        	$(".message").html("<td class='danger'>Your application has blank questions!</td>");
	        	e.preventDefault();
	        }
		}
	});

	$("form input[type=submit]").click(function() {
	    $("input[type=submit]", $(this).parents("form")).removeAttr("clicked");
	    $(this).attr("clicked", "true");
	});

	$(".simply-count-100").keyup(function() {
		console.log($("#"+$(this)[0].name + "_count"));
		$("#"+$(this)[0].name + "_count").html(101 - wordCount($(this).val()))
		$(this).val(limitWord($(this).val(),100));
	});

	$(".simply-count-250").keyup(function() {
		console.log($("#"+$(this)[0].name + "_count"));
		$("#"+$(this)[0].name + "_count").html(251 - wordCount($(this).val()))
		$(this).val(limitWord($(this).val(),250));
	});

	function limitWord(myString, limit){
		return myString
		  .replace(/\s+/g, ' ')
		  .split(' ')         
		  .splice(0, limit)  
		  .join(' ');       
	}

	function wordCount(myString){
		return myString
		  .replace(/\s+/g, ' ')
		  .split(' ')
		  .length; 
	}
});
</script>
@stop