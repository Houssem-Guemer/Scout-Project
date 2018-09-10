<?php

use Illuminate\Http\Request;
use App\Events\MessagePosted;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth.basic');
Route::get('/getCalenderEvents',[  'uses' =>'EventController@getCalenderEvents']);
Route::get('/scouts/cubs',[

    'uses' =>'ScoutController@getScouts'
])->name('cubs');
Route::get('/scouts/scout',[

    'uses' =>'ScoutController@getScouts'
])->name('scout');
Route::get('/scouts/advanced_scout',[

    'uses' =>'ScoutController@getScouts'
])->name('advanced_scouts');
Route::get('/scouts/traveler',[

    'uses' =>'ScoutController@getScouts'
])->name('traveler');

Route::get('/scouts/captain',[

    'uses' =>'ScoutController@getScouts'
])->name('captain');

Route::get('/getScout/{id}',[

    'uses' =>'ScoutController@getScout'
])->name('allunits');
Route::get('/getScout/captain/{id}',[

    'uses' =>'ScoutController@getScout'
])->name('getCaptain');

Route::put('/EditScoutInfo/{id}',[

    'uses' =>'ScoutController@EditScoutInfo'
]);


Route::delete('/deleteScout/{scout_id}',[

    'uses' =>'ScoutController@destroy'
]);
Route::post('/AddNewScout',[

    'uses' =>'ScoutController@AddNewScout'
]);


Route::post('/createOurUnits',[

    'uses' =>'ScoutController@createOurUnits'
]);

Route::get('/Units',[

    'uses' =>'ScoutController@getUnits'
]);

Route::get('/users-accounts',[

    'uses' =>'AccountsController@getUsersAccounts'
]);

Route::post('/addnewaccount',[

    'uses' =>'AccountsController@AddNewAccount'
])->name('new_user');


Route::get('/getUser',[
    'uses' =>'AccountsController@getUser'
]);
Route::post('/UpdateMyInfo',[
    'uses' =>'AccountsController@UpdateMyInfo'

]);Route::put('/newpassword',[
    'uses' =>'AccountsController@ChangePassword'
]);
Route::delete('/deleteaccount/{scout_id}',[
    'uses' =>'AccountsController@DeleteAccount'
]);
Route::get('/getuseremail/{scout_id}',[
    'uses' =>'AccountsController@getuseremail'
]);
Route::put('/changeemail/{scout_id}',[
    'uses' =>'AccountsController@ChangeUserEmail'
]);
Route::put('/changepassword/{scout_id}',[
    'uses' =>'AccountsController@ChangeUserPassword'
]);
Route::get('/getimage',[
    'uses' =>'AccountsController@getMyImage'
]);
Route::post('/changmyimage',[
    'uses' =>'AccountsController@ChangMyImage'
]);
Route::get('/getMembershipdate/{scout_id}',[
    'uses' =>'AccountsController@getMembershipdate'
]);

Route::get('/getAllCaptains',[
    'uses' =>'AccountsController@getAllCaptains'
]);
Route::get('/getAllCaptainsNotUser',[
    'uses' =>'AccountsController@getAllCaptainsNotUser'
]);
Route::get('/getCaptains',[
    'uses' =>'EventController@getCaptains'
]);
Route::post('/postEvent',[
    'uses' =>'EventController@PostEvent'
]);
Route::get('/getMyEvents',[
    'uses' =>'EventController@getMyEvents'
]);
Route::get('/getEvent/{event_id}',[
    'uses' =>'EventController@getEvent'
]);

Route::post('/UpdateEvent',[
    'uses' =>'EventController@UpdateEvent'
]);
Route::delete('/deleteEvent/{event_id}',[
    'uses' =>'EventController@deleteEvent'
]);
Route::get('/getConcernedEvents',[
    'uses' =>'EventController@getConcernedEvents'
]);
Route::post('/Confirm_presence',[
    'uses' =>'EventController@Confirm_presence'
]);
Route::post('/Confirm_absence',[
    'uses' =>'EventController@Confirm_absence'
]);
Route::get('/getPresenceEvents',[
    'uses' =>'EventController@getPresenceEvents'
]);
Route::get('/getabsenceevents',[
    'uses' =>'EventController@getabsenceevents'
]);
Route::get('/getMyEventsApproved',[
    'uses' =>'EventController@getMyEventsApproved'
]);
Route::get('/getMyUnitEvents',[
    'uses' =>'EventController@getMyUnitEvents'
]);
Route::get('/getEventsNotApproved',[
    'uses' =>'EventController@getEventsNotApproved'
]);
Route::post('/approveEvent',[
    'uses' =>'EventController@approveEvent'
]);
Route::post('/disapproveEvent',[
    'uses' =>'EventController@disapproveEvent'
]);
Route::get('/getEventsApproved',[
    'uses' =>'EventController@getEventsApproved'
]);
Route::get('/getUnitEvents/{unit_number}',[
    'uses' =>'EventController@getUnitEvents'
]);
Route::post('/newpost',[
    'uses' =>'postsController@createNewPost'
]);

Route::get('/getMyPosts',[
    'uses' =>'postsController@getMyPosts'
]);

Route::get('/getMyUnitPosts',[
    'uses' =>'postsController@getMyUnitPosts'
]);
Route::get('/getPostsNotApproved',[
    'uses' =>'postsController@getPostsNotApproved'
]);

Route::get('/getPostsApproved',[
    'uses' =>'postsController@getPostsApproved'
]);
Route::get('/getUnitPostsNotApproved',[
    'uses' =>'postsController@getUnitPostsNotApproved'
]);
Route::get('/getUnitPostsApproved',[
    'uses' =>'postsController@getUnitPostsApproved'
]);
Route::delete('/deletepost/{post_id}',[
    'uses' =>'postsController@DeletePost'
]);
Route::post('/approvePost/{post_id}',[
    'uses' =>'postsController@ApprovePost'
]);
Route::post('/disapprovePost/{post_id}',[
    'uses' =>'postsController@DisapprovePost'
]);
Route::get('/getPost/{post_id}',[
    'uses' =>'postsController@getPost'
]);
Route::post('/EditPost/{post_id}',[
    'uses' =>'postsController@EditPost'
]);
Route::get('/current_user',function (){
    return response()->json(["current_user"=>Auth::user()->captain->role]);
});
Route::get('/getUnitPosts/{unit_id}',[
    'uses' =>'postsController@getUnitPosts'
]);
Route::get('/getMyApprovedPosts',[
    'uses' =>'postsController@getMyApprovedPosts'
]);




Route::post('/marsNotificationAsRead',function(){
  $user = Auth::user();

$user->unreadNotifications->markAsRead();
return response()->json(["unreadsnotifications"=>0]);
});







Route::get('/dashboard/messages', function (){
    return App\Message::with('scout')->get();
});

Route::post('/dashboard/messages', function () {

    $user = Auth::user();
    $message= $user->messages()->create([



        'username'=>request()->get('username'),
        'message'=>request()->get('message')




    ]);

    $scout = $user->profile;
    broadcast( new MessagePosted($message,$scout))->toOthers();

    return response()->json(["status","ok"]) ;
});








Route::get('/dashboard/users', function (){
    return App\User::with('Profile')->get();
});

Route::get('/getsomeinfo',[
    'uses' =>'AccountsController@getSomeInfo'
]);









Route::get('/scouts', function (Request $request) {
    $permissions = $request->user()->captain->role->permissions;

})->middleware('auth:api');
