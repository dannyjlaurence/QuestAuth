<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*********************************************************
* Quest Web System routes
*
*********************************************************/

Route::get('/', array('as' => 'index', function()
{
	return View::make('index');
}));

Route::get('/login', array('as' => 'login', function()
{
	return View::make('login');
}));

Route::get('/internalLogin', array('as' => 'internalLogin', function()
{
	return View::make('internal_login');
}));

Route::post('login', array( 'uses' => 'UserController@loginAction'));
Route::any('prelogin', array( 'uses' => 'UserController@preLoginAction'));

Route::any('logout', array('as' => 'logout', 'uses' => 'UserController@logoutAction'));

Route::get('/home', array('before' => array('auth'), 'as' => 'home', function()
{
	return View::make('home');
}));

Route::get('/questCheck/{uid}', array('before' => array('auth'), 'as' => 'questCheck', function($uid)
{
	$test = KnownId::where("uid","=",$uid)->first();
	return Response::json(array("isQuest"=>!is_null($test)));
}));

Route::post('register', array( 'uses' => 'UserController@register'));

/*********************************************************
* Role Filters
*
*********************************************************/

Route::filter('applicant', function()
{
	$application = Application::where('name', '=', "Application 2015")->firstOrFail();
	if(!(strtotime($application->appStartDate()) < strtotime(date(DATE_RFC2822)) && strtotime($application->appDueDate()) >= strtotime(date(DATE_RFC2822)))){
		if(!is_null(Auth::user()->userApplication) && Auth::user()->userApplication->submitted){
			$message = "Thanks for your submission! Your application is currently being considered.";
			return View::make('home',array('message' => $message));
		} else {
			$message = "Applications are closed for this year.";
			return View::make('home',array('message' => $message));
		}
	}	
	if(!Auth::user()->isApplicant()){
		return Redirect::to('home'); 
	}
});

Route::filter('reader', function()
{
	if(!Auth::user()->isReader()){
		return Redirect::to('home'); 
	}
});

Route::filter('qualityguild', function()
{
	if(!Auth::user()->isQualityGuild()){
		return Redirect::to('home'); 
	}
});



/*********************************************************
* Quest Applications
*
*********************************************************/
//Applicants

Route::group(array('before' => array('auth', 'applicant')), function(){
	Route::resource('UserApplications', 'UserApplicationsController');
	Route::get('/UserApplications/{id}/delete', array('as' => 'UserApplications.delete', 'uses' => 'UserApplicationsController@destroy'));

});

//Quality Guild

Route::group(array('before' => array('auth', 'qualityguild')), function(){

	Route::get('/admin', array('as' => 'admin', function()
	{
		return View::make('QuestApplication.qualityguild.admin');
	}));
});
