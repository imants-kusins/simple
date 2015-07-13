<?php


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::get('/', 'MainController@index');
Route::get('logout', 'MainController@logout');


Route::get('create', 'CampaignController@create');
Route::get('campaigns', 'CampaignController@index');


Route::get('create-new-user', 'MainController@createUser');

Route::post('save-campaign', 'CampaignController@store');



// Route::get('/', 'WelcomeController@index');
// Route::get('home', 'HomeController@index');

// Route::post('create-user', 'VisitorController@create');
// Route::get('delete-visitor/{id}', 'VisitorController@delete');
// Route::get('download-csv', 'VisitorController@downloadCsv');


