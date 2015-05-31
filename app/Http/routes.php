<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Location;
use App\Education;
use App\Module;

Route::filter('auth', function()
{
    if (Auth::guest()) {
        return Redirect::route('home');
    }
});
Route::group(array('before'=>'auth'), function() {   
	Route::resource('gebruikers', 'UserController');
	Route::resource('locaties', 'LocationController');
	Route::resource('modules', 'ModuleController');
	Route::resource('opleidingen', 'EducationController');
});

Route::get('api/locaties', function(){
	return Location::all();
});

Route::get('api/locaties/{locatieId}/opleidingen', function($locatieId){
	$locations = Location::find($locatieId);
	return $locations->educations;
});

Route::get('api/locaties/{locatieId}/opleidingen/{opleidingId}/modules', function($locatieId, $opleidingId){
	$educations = Education::find($opleidingId);
	return $educations->modules;
});


Route::get('api/locaties/{locatieId}/opleidingen/{opleidingId}/modules/{moduleId}', function($locatieId, $opleidingId, $moduleId){
	return Module::where('id', '=', $moduleId)->get();
});


Route::get('/',['as' => 'home', 'uses' => 'HomeController@index']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
