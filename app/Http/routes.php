<?php


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


// proper routing

Route::group(array('middleware' => 'auth'), function()
{

	Route::get('campaigns', array('uses' => 'CampaignController@index'));
    

});


Route::get('/', 'MainController@index');
Route::get('logout', 'MainController@logout');

Route::get('create', array('middleware' => 'auth', 'uses' => 'CampaignController@create'));
// Route::get('campaigns', array('middleware' => 'auth', 'uses' => 'CampaignController@index'));
Route::get('home', array('middleware' => 'auth', 'uses' => 'CampaignController@index'));

Route::get('find-winners', 'CampaignController@showWinners');




Route::get('create-new-user', 'MainController@createUser');

Route::post('save-campaign', 'CampaignController@store');

Route::get('download-csv', 'CampaignController@downloadCsv');


