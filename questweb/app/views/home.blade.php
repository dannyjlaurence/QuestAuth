@extends('layout')

@section('custHeader')
<style>

/* MARKETING CONTENT
-------------------------------------------------- */

/* Pad the edges of the mobile views a bit */
.marketing {
  padding-right: 15px;
  padding-left: 15px;
}

/* Center align the text within the three columns below the carousel */
.marketing .col-lg-4 {
  margin-bottom: 20px;
  text-align: center;
}
.marketing h2 {
  font-weight: normal;
}
.marketing .col-lg-4 p {
  margin-right: 10px;
  margin-left: 10px;
}

/* RESPONSIVE CSS
-------------------------------------------------- */

@media (min-width: 768px) {

  /* Remove the edge padding needed for mobile */
  .marketing {
    padding-right: 0;
    padding-left: 0;
  }

  /* Navbar positioning foo */
  .navbar-wrapper {
    margin-top: 20px;
  }
  .navbar-wrapper .container {
    padding-right: 15px;
    padding-left:  15px;
  }
  .navbar-wrapper .navbar {
    padding-right: 0;
    padding-left:  0;
  }

  .featurette-heading {
    font-size: 50px;
  }
}

.col-centered{
  text-align: center;
}

@media (min-width: 992px) {
  .featurette-heading {
    margin-top: 120px;
  }
}

</style>
@stop

@section('homeClass')
    class="active"
@stop

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      <img src="q_color.png" class="img-rounded img-responsive" style="max-height: 100%; height: auto;"/>
    </div>
  </div>
</div>
<hr/>

@if(isset($message))
  <div class="row">
    <div class="col-xs-12">
      <table class="table">
        <tr>
          <td class="danger">{{ $message }}</td>
        </tr>
      </table>
    </div>
  </div>
@endif
<div class="container marketing">
  <!-- Three columns of text below the carousel -->
  <div class="row">
    @foreach(Auth::user()->getHomeLinks() as $key => $value)
      <div class="col-lg-4">
        <a href="{{ $value[0] }}"><i class="fa {{ $value[1] }}" style="font-size:200px;"></i>
        <h2>{{ $key }}</h2></a>
      </div><!-- /.col-lg-4 -->
    @endforeach
  </div><!-- /.row -->
</div>
@stop
