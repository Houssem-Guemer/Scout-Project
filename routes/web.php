<?php

use App\Events\MessagePosted;
use App\Scout;
use App\User;
use App\Notifications\notifyCaptain;
use Intervention\Image\ImageManager;


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




//Route::get('/optimized/images/{image}/{width}/{height}','HomeController@OptimizeImages')->name('optimized');

/*Route::get('/optimizeScout','HomeController@OptimizeScoutImages');
Route::get('/optimizeEvent','HomeController@OptimizeEventImages');
Route::get('/optimizePost','HomeController@OptimizePostImages');
Route::get('/optimizeBook','HomeController@optimizeBooks');
Route::get('/OptimizeTest','HomeController@OptimizeTest');
*/

/* home controller */
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cubs', 'HomeController@cubs')->name('cubs');
Route::get('/scout', 'HomeController@scout')->name('scout');
Route::get('/advanced_scout', 'HomeController@advanced_scout')->name('advanced_scout');
Route::get('/traveler', 'HomeController@traveler')->name('traveler');
Route::get('/captains', 'HomeController@captains')->name('captains');
Route::get('/news', 'HomeController@news')->name('news');
Route::get('/posts/{id}', 'HomeController@viewPost')->name('readPost');
Route::get('/events', 'HomeController@events')->name('events');
Route::get('/events/{id}', 'HomeController@viewEvent')->name('readEvent');
Route::get('/library', 'HomeController@library')->name('library');
Route::get('/team', 'HomeController@team')->name('team');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/about', 'HomeController@about')->name('about');
Route::post('/newSubscriber', 'PostSubscribe@newSubscriber')->middleware('optimizeImages');
Route::post('/contactForm', 'PostSubscribe@contactForm')->middleware('optimizeImages');

Route::get('/login', 'DashboardController@index');
Route::get('/logout', 'DashboardController@index');
Route::get('/user', 'ActivityController@index');

Route::get('/dashboard', 'DashboardController@index');
Route::any('/dashboard/{query}', 'DashboardController@index')->where('query', '.*');


Auth::routes();



/* ================================
    Dashboard Dependent Routes
=================================== */
// Route::get('/dashboard/scouts/accounts/register', "UserController@registration");
//Route::get('/dashboard/scouts/accounts', "UserController@index");
Route::get('/dashboard/{vue_capture?}', function(){
    return view('Layouts.template');
    })->where('vue_capture', '[\/\w\.-]*');

Route::post('/dashboard/scouts/accounts', "UserController@store")->middleware('optimizeImages');;
Route::get('/dashboard/scouts/accounts/edit/{id}', "UserController@edit");
Route::get('/dashboard/scouts/accounts/show/{id}', "UserController@show");
Route::put('/dashboard/scouts/accounts/update/{id}', "UserController@update");
Route::delete('/dashboard/scouts/accounts/destroy/{id}', "UserController@destroy");

Route::post('/upload/{id}', "UserController@upload")->middleware('optimizeImages');; //to be revised
Route::post('/authentication/{id}', "UserController@authentication")->middleware('optimizeImages');; //not really sure about this route ...
Route::post('/importcsv', "UserController@importcsv")->middleware('optimizeImages');; //to be revised
Route::get('/import', "UserController@importuser"); //to be revised
Route::get('/profile', "UserController@profile"); //to be revised
Route::get('/profileEdit', "UserController@profileEdit"); //to be retracked to ScoutsController
Route::get('/dashboard/scouts/accounts/export', "UserController@xlsexport");
Route::get('/pdf', "UserController@pdfexport"); //can be handled without a controller
Route::get('/usersprint', "UserController@userlistprint"); //can be handled without a controller

/* send email (needs rework) */
Route::get('/sendemail', "UserController@sendemail");
Route::post('/user/sendemail', "UserController@sendemail")->middleware('optimizeImages');;

/* Language (doubtful because language can be changed by setLocale())*/
Route::get('/language', "LanguageController@index");
Route::post('LanguageController/store', ['as' => 'languages.store', 'uses' => 'LanguageController@store'])->middleware('optimizeImages');
Route::get('LanguageController/edit/{id}', "LanguageController@edit");
Route::post('LanguageController/update/{id}', "LanguageController@update")->middleware('optimizeImages');
Route::get('LanguageController/chooser_language/{id}', "LanguageController@chooser_language");
Route::get('/LanguageController/destroy/{id}/{lan}', "LanguageController@destroy");

/* roles and Permission */
Route::get('/dashboard/roles', "RoleController@index");
Route::get('/dashboard/roles/edit/{id}', "RoleController@edit");
Route::post('/dashboard/roles', 'RoleController@store')->middleware('optimizeImages');
Route::put('/dashboard/roles/update/{id}', 'RoleController@update');
Route::delete('/dashboard/roles/destroy/{id}', "RoleController@destroy");

Route::get('/dashboard/permissions', "PermissionController@index");
Route::get('/dashboard/permissions/edit/{id}', "PermissionController@edit");
Route::post('/dashboard/permissions', 'PermissionController@store')->middleware('optimizeImages');
Route::put('/dashboard/permissions/update/{id}', 'PermissionController@update');
Route::post('/dashboard/permissions/attach', 'PermissionController@saveRolePermissions')->middleware('optimizeImages');
Route::delete('/dashboard/permissions/destroy/{id}', "PermissionController@destroy");

/* User Activity activity */
Route::get('/dashboard/activity', "ActivityController@index");
Route::get('/dashboard/activity/user/{id}', "ActivityController@activity_user");

/* Setting (subject to deletion)*/
Route::get('/settings', "SettingController@index");
Route::post('/settings', "SettingController@store")->middleware('optimizeImages');
Route::post('/SettingController/upload/{id}', "SettingController@upload")->middleware('optimizeImages');
Route::post('/SettingController/auth_registration', "SettingController@auth_registration")->middleware('optimizeImages');
Route::get('/dashboard#/SettingController/sidebar', "SettingController@sidebar");

/* Message (TODO)*/
Route::get('/message', "MessageController@index");
Route::get('/SendMessage', "MessageController@sendmail");
Route::get('/sendDetails/{id}', "MessageController@sendDetails");
Route::get('/inboxDetails/{id}/{replayidid}', "MessageController@inboxDetails");
Route::post('MessageController/save/', "MessageController@store")->middleware('optimizeImages');
Route::post('MessageController/destroy/', "MessageController@destroy")->middleware('optimizeImages');

/* Posts to be redone from scratch*/
Route::get('/dashboard/posts/', "postsController@index");
Route::post('/dashboard/posts/upload', "postsController@upload")->middleware('optimizeImages');
Route::post('/dashboard/posts/', "postsController@store")->middleware('optimizeImages');
Route::get('/dashboard/posts/create', "postsController@create");
Route::get('/dashboard/posts/{id}', "postsController@show");

/* RSS feeds routs */
Route::get('/eventsFeed', 'FeedController@eventsFeed')->name('eventsFeed');
Route::get('/postsFeed', 'FeedController@postsFeed')->name('postsFeed');

/* sitemap urls */
Route::get('/sitemap', 'SitemapController@index');
Route::get('/sitemap/main', 'SitemapController@main');
Route::get('/sitemap/cubs', 'SitemapController@cubs');
Route::get('/sitemap/scout', 'SitemapController@scout');
Route::get('/sitemap/advanced_scout', 'SitemapController@advanced_scout');
Route::get('/sitemap/traveler', 'SitemapController@traveler');
Route::get('/sitemap/captains', 'SitemapController@captains');
Route::get('/sitemap/news', 'SitemapController@news');
Route::get('/sitemap/events', 'SitemapController@events');
Route::get('/sitemap/library', 'SitemapController@library');

Route::get('/OptimizeImages', 'HomeController@OptimizeImages');





