<?php


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


// proper routing

Route::group(array('middleware' => 'auth'), function()
{

	Route::get('campaigns', array('uses' => 'CampaignController@index'));
    Route::get('view-campaign/{id}', array('uses' => 'CampaignController@viewSingleCampaign'));
    Route::get('create-campaign', array('uses' => 'CampaignController@create'));

    # Creates a admin user
    Route::get('create-new-user', 'MainController@createUser');

    Route::get('download-csv/{id}/{?filter}', 'CampaignController@downloadCsv');
    Route::post('find-winners', 'CampaignController@findWinners');
    
    Route::get('home', array('uses' => 'CampaignController@index'));

    Route::post('save-campaign', 'CampaignController@store');

});


Route::get('/', 'MainController@index');
Route::get('logout', 'MainController@logout');

Route::get('terms', 'MainController@terms');