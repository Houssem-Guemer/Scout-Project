<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


/* home controller */
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/login', 'DashboardController@index');
Route::get('/logout', 'DashboardController@index'); 
Route::get('/dashboard', "DashboardController@index");

Auth::routes();

/* ================================ 
    Dashboard Dependent Routes
=================================== */
// Route::get('/dashboard/scouts/accounts/register', "UserController@registration");
//Route::get('/dashboard/scouts/accounts', "UserController@index");
Route::get('/dashboard/{vue_capture?}', function(){
    return view('Layouts.template');
    })->where('vue_capture', '[\/\w\.-]*');

Route::post('/dashboard/scouts/accounts', "UserController@store");
Route::get('/dashboard/scouts/accounts/edit/{id}', "UserController@edit");
Route::get('/dashboard/scouts/accounts/show/{id}', "UserController@show");
Route::put('/dashboard/scouts/accounts/update/{id}', "UserController@update");
Route::delete('/dashboard/scouts/accounts/destroy/{id}', "UserController@destroy");

Route::post('/upload/{id}', "UserController@upload"); //to be revised
Route::post('/authentication/{id}', "UserController@authentication"); //not really sure about this route ...
Route::post('/importcsv', "UserController@importcsv"); //to be revised
Route::get('/import', "UserController@importuser"); //to be revised
Route::get('/profile', "UserController@profile"); //to be revised
Route::get('/profileEdit', "UserController@profileEdit"); //to be retracked to ScoutsController
Route::get('/dashboard/scouts/accounts/export', "UserController@xlsexport"); 
Route::get('/pdf', "UserController@pdfexport"); //can be handled without a controller
Route::get('/usersprint', "UserController@userlistprint"); //can be handled without a controller

/* send email (needs rework) */
Route::get('/sendemail', "UserController@sendemail");
Route::post('/user/sendemail', "UserController@sendemail");

/* Language (doubtful because language can be changed by setLocale())*/
Route::get('/language', "LanguageController@index");
Route::post('LanguageController/store', ['as' => 'languages.store', 'uses' => 'LanguageController@store']);
Route::get('LanguageController/edit/{id}', "LanguageController@edit");
Route::post('LanguageController/update/{id}', "LanguageController@update");
Route::get('LanguageController/chooser_language/{id}',"LanguageController@chooser_language" );
Route::get('/LanguageController/destroy/{id}/{lan}', "LanguageController@destroy");

/* roles and Permission */
Route::get('/dashboard/roles', "RoleController@index");
Route::get('/dashboard/roles/edit/{id}', "RoleController@edit");
Route::post('/dashboard/roles', 'RoleController@store');
Route::put('/dashboard/roles/update/{id}','RoleController@update');
Route::delete('/dashboard/roles/destroy/{id}', "RoleController@destroy");

Route::get('/dashboard/permissions', "PermissionController@index");
Route::get('/dashboard/permissions/edit/{id}', "PermissionController@edit");
Route::post('/dashboard/permissions', 'PermissionController@store');
Route::put('/dashboard/permissions/update/{id}','PermissionController@update');
Route::post('/dashboard/permissions/attach', 'PermissionController@saveRolePermissions');
Route::delete('/dashboard/permissions/destroy/{id}', "PermissionController@destroy");

/* User Activity activity */ 
Route::get('/dashboard/activity', "ActivityController@index");
Route::get('/dashboard/activity/user/{id}', "ActivityController@activity_user");

/* Setting (subject to deletion)*/ 
Route::get('/settings/', "SettingController@index");
Route::post('/settings/', "SettingController@store");
Route::post('/SettingController/upload/{id}', "SettingController@upload");
Route::post('/SettingController/auth_registration', "SettingController@auth_registration");
Route::get('/SettingController/sidebar', "SettingController@sidebar");

/* Message (TODO)*/ 
Route::get('/message/', "MessageController@index");
Route::get('/SendMessage/', "MessageController@sendmail");
Route::get('/sendDetails/{id}', "MessageController@sendDetails");
Route::get('/inboxDetails/{id}/{replayidid}', "MessageController@inboxDetails");
Route::post('MessageController/save/', "MessageController@store");
Route::post('MessageController/destroy/', "MessageController@destroy");

/* Posts to be redone from scratch*/
Route::get('/dashboard/posts/', "postsController@index");
Route::post('/dashboard/posts/upload', "postsController@upload");
Route::post('/dashboard/posts/', "postsController@store");
Route::get('/dashboard/posts/create', "postsController@create");
Route::get('/dashboard/posts/{id}', "postsController@show");
