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
Route::get('/getContactUs','PostSubscribe@getContactUs');
Route::delete('/deletecontactmessage/{id}','PostSubscribe@deleteContactMessage');
Route::get('/getCalenderEvents',[  'uses' =>'EventController@getCalenderEvents']);
Route::get('/dashboard/scouts/cubs',[

    'uses' =>'ScoutController@getScouts'
])->name('cubs');
Route::get('/dashboard/scouts/scout',[

    'uses' =>'ScoutController@getScouts'
])->name('scout');
Route::get('/dashboard/scouts/advanced_scout',[

    'uses' =>'ScoutController@getScouts'
])->name('advanced_scouts');
Route::get('/dashboard/scouts/traveler',[

    'uses' =>'ScoutController@getScouts'
])->name('traveler');

Route::get('/dashboard/scouts/captain',[

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
])->middleware('optimizeImages');


Route::post('/createOurUnits',[

    'uses' =>'ScoutController@createOurUnits'
])->middleware('optimizeImages');

Route::get('/Units',[

    'uses' =>'ScoutController@getUnits'
]);

Route::get('/users-accounts',[

    'uses' =>'AccountsController@getUsersAccounts'
]);

Route::post('/addnewaccount',[

    'uses' =>'AccountsController@AddNewAccount'
])->name('new_user')->middleware('optimizeImages');


Route::get('/getUser',[
    'uses' =>'AccountsController@getUser'
]);

Route::get('/getcurrentuser',[
    'uses' =>'AccountsController@getcurrentuser'
]);
Route::post('/UpdateMyInfo',[
    'uses' =>'AccountsController@UpdateMyInfo'

])->middleware('optimizeImages');;
Route::post('/UpdateCurriculumVitae','ScoutController@UpdateCurriculumVitae'

)->middleware('optimizeImages');
Route::get('/getCurriculumVitae','ScoutController@getCurriculumVitae'

);
Route::post('/social_media_accounts','ScoutController@social_media_accounts'

)->middleware('optimizeImages');;
Route::get('/getsocial_media_accounts','ScoutController@getsocial_media_accounts'

);
Route::put('/newpassword',[
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
])->middleware('optimizeImages');
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
])->middleware('optimizeImages');
Route::get('/getMyEvents',[
    'uses' =>'EventController@getMyEvents'
]);
Route::get('/getEvent/{event_id}',[
    'uses' =>'EventController@getEvent'
]);

Route::post('/UpdateEvent',[
    'uses' =>'EventController@UpdateEvent'
])->middleware('optimizeImages');
Route::delete('/deleteEvent/{event_id}',[
    'uses' =>'EventController@deleteEvent'
]);
Route::get('/getConcernedEvents',[
    'uses' =>'EventController@getConcernedEvents'
]);
Route::post('/Confirm_presence',[
    'uses' =>'EventController@Confirm_presence'
])->middleware('optimizeImages');
Route::post('/Confirm_absence',[
    'uses' =>'EventController@Confirm_absence'
])->middleware('optimizeImages');
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
])->middleware('optimizeImages');
Route::post('/disapproveEvent',[
    'uses' =>'EventController@disapproveEvent'
])->middleware('optimizeImages');
Route::get('/getEventsApproved',[
    'uses' =>'EventController@getEventsApproved'
]);
Route::get('/getUnitEvents/{unit_number}',[
    'uses' =>'EventController@getUnitEvents'
]);
Route::post('/newpost',[
    'uses' =>'postsController@createNewPost'
])->middleware('optimizeImages');

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
])->middleware('optimizeImages');
Route::post('/disapprovePost/{post_id}',[
    'uses' =>'postsController@DisapprovePost'
])->middleware('optimizeImages');
Route::get('/getPost/{post_id}',[
    'uses' =>'postsController@getPost'
]);
Route::post('/EditPost/{post_id}',[
    'uses' =>'postsController@EditPost'
])->middleware('optimizeImages');

Route::get('/current_user','AccountsController@current_user');
Route::get('/getUnitPosts/{unit_id}',[
    'uses' =>'postsController@getUnitPosts'
]);
Route::get('/getMyApprovedPosts',[
    'uses' =>'postsController@getMyApprovedPosts'
]);

Route::post('/update_money',
[  'uses' =>'FinanceController@update_money']
)->middleware('optimizeImages');
Route::get('/getmoney_values',
[  'uses' =>'FinanceController@getmoney_values']
);
Route::get('/getyearly_money',
[  'uses' =>'FinanceController@getyearly_money']
);
Route::get('/getGovernor',
[  'uses' =>'FormsController@getGovernor']
);
Route::post('/previewHonorary_pdf', 'FormsController@previewHonorary'
)->middleware('optimizeImages');
Route::put('/downloadHonoraryPDF', 'FormsController@downloadHonoraryPDF'
);
Route::post('/previewReporte_Scout_state_gov', 'FormsController@previewReporte_Scout_state_gov'
)->middleware('optimizeImages');
Route::put('/downloadReporte_Scout_state_gov', 'FormsController@downloadReporte_Scout_state_gov'
);
Route::post('/PreviewSecurity_ReporterPDF', 'FormsController@PreviewSecurity_ReporterPDF'
)->middleware('optimizeImages');
Route::put('/downloadSecurity_ReporterPDF', 'FormsController@downloadSecurity_ReporterPDF'
);
Route::post('/previewEducational_Institutions', 'FormsController@previewEducational_Institutions'
)->middleware('optimizeImages');
Route::put('/downloadEducational_Institutions', 'FormsController@downloadEducational_Institutions'
);
Route::put('/Assigning_mission_travel', 'FormsController@Assigning_mission_travel'
);

Route::post('/previewOuting_mailPDF', 'FormsController@previewOuting_mailPDF'
)->middleware('optimizeImages');

Route::put('/downloadOuting_mailPDF', 'FormsController@downloadOuting_mailPDF'
);
Route::put('/downloadoutingmail', 'FormsController@downloadoutingmail'
);
Route::put('/SendOuting_mail_forAgree', 'FormsController@SendOuting_mail_forAgree'
);
Route::put('/downloadInaugurationPDF', 'FormsController@downloadInaugurationPDF'
);
Route::put('/downloadAssigning_missionPDF', 'FormsController@downloadAssigning_missionPDF'
);
Route::get('/getMyScout', 'FormsController@getMyScout'
);
Route::put('/downloadActivityPaperPDF', 'FormsController@downloadActivityPaperPDF'
);
Route::put('/manageMonthlyRapportPDF', 'FormsController@manageMonthlyRapportPDF'
);
Route::get('/getNbr_of_Events', 'DashboardController@getNbr_of_Events'
);
Route::get('/getNbr_of_Posts', 'DashboardController@getNbr_of_Posts'
);

Route::get('/getAccount_Nbr', 'DashboardController@getAccount_Nbr'
);
Route::get('/GetCorrespondences', 'FormsController@GetCorrespondences'
);
Route::get('/GetMyCorrespondences', 'FormsController@GetMyCorrespondences'
);
Route::get('/Authenticate_Correspondence/{correspondence_id}', 'FormsController@Authenticate_Correspondence'
);


Route::get('/getMyTeam', 'DashboardController@getMyTeam'
);
Route::get('/Landing_page_images', 'DashboardController@Landing_page_images'
);
Route::get('/GetMoneyFundInfo', 'FinanceController@GetMoneyFundInfo'
);
Route::post('/update_BankAccount_Info', 'FinanceController@update_BankAccount_Info'
);
Route::get('/getyearly_money_account', 'FinanceController@getyearly_money_account'
);
Route::get('/getaccount_monthly_review', 'FinanceController@getaccount_monthly_review'
);
Route::get('/ExportUsersList', 'AccountsController@ExportUsersList'
);
Route::put('/ExportScoutList', 'ScoutController@ExportScoutList'
);
Route::get('/getHubInfo_forGOv', 'DashboardController@getHubInfo_forGOv'
);
Route::get('/getHubInfo_forFin', 'DashboardController@getHubInfo_forFin'
);
Route::get('/getHubInfo_forVgov', 'DashboardController@getHubInfo_forVgov'
);
Route::get('/getHubInfo_forMed', 'DashboardController@getHubInfo_forMed'
);
Route::get('/GetMonthlyReport', 'FormsController@GetMonthlyReport'
);
Route::put('/GetReport', 'FormsController@GetReport'
);
Route::put('/GetActivity_Paper_Report', 'FormsController@GetActivity_Paper_Report'
);
Route::get('/getHubInfo_forUnit', 'DashboardController@getHubInfo_forUnit'
);
Route::get('/getHubInfo_forSurv', 'DashboardController@getHubInfo_forSurv'
);
Route::get('/getHubInfo_forCsd', 'DashboardController@getHubInfo_forCsd'
);

Route::get('/this_month_money_report', 'FinanceController@this_month_money_report'
);
Route::get('/DownloadFinanceReport', 'FinanceController@DownloadFinanceReport'
);
Route::get('/SendFinanceReport', 'FinanceController@SendFinanceReport'
);
Route::post('/SendActivityPaperPDF', 'FormsController@SendActivityPaperPDF'
);
Route::delete('/delete_document/{id}', 'FormsController@delete_document'
);
Route::put('/addNewCarouselImage', 'DashboardController@addNewCarouselImage'
);
Route::delete('/deleteCarouselImage/{id}', 'DashboardController@deleteCarouselImage'
);
Route::get('/getCategories', 'BooksController@getCategories'
);
Route::put('/UploadBook', 'BooksController@UploadBook'
);
Route::get('/getBooks', 'BooksController@getBooks'
);
Route::delete('/deleteBook/{id}', 'BooksController@deleteBook'
);
Route::get('/getBook/{id}', 'BooksController@getBook'
);
Route::put('/EditBookInfo/{id}', 'BooksController@EditBookInfo'
);
Route::Post('/ExportPresentsCaptains/{id}', 'FormsController@ExportPresentCaptains')->name('ExportPresentsCaptains');

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

/*Mobile API*/
Route::get('/minit','MobileController@initKeys');
Route::get('/mlogin','MobileController@login');
Route::middleware('auth:api')->get('/muser', 'MobileController@user');
Route::middleware(['auth:api','cache'])->get('/mobile/getCubs','ScoutController@mgetScouts')->name('cubs');
Route::middleware(['auth:api','cache'])->get('/mobile/getScouts','ScoutController@mgetScouts')->name('scout');
Route::middleware(['auth:api','cache'])->get('/mobile/getAdvancedScouts','ScoutController@mgetScouts')->name('advanced_scouts');
Route::middleware(['auth:api','cache'])->get('/mobile/getTravelers','ScoutController@mgetScouts')->name('traveler');
Route::middleware(['auth:api','cache'])->get('/mobile/getCaptains','ScoutController@mgetScouts')->name('captain');
Route::middleware('auth:api')->get('/mobile/finance','FinanceController@mgetmoney_values')->name('finance');

Route::middleware(['auth:api','cache'])->post('/mobile/EditScoutInfo/{id}','ScoutController@mEditScoutInfo');
Route::middleware('auth:api')->get('/mobile/downloadOuting_mailPDF','FormsController@mdownloadOuting_mailPDF');
Route::middleware('auth:api')->get('/mobile/download_Assigning_mission_mobile','FormsController@mdownloadAssigning_missionPDF');
Route::middleware('auth:api')->get('/mobile/download_Assigning_mission_Travel_mobile','FormsController@mAssigning_mission_travel');

Route::middleware(['auth:api','cache'])->get('/mobile/users-accounts','AccountsController@getUsersAccounts');
Route::middleware('auth:api')->get('/mobile/changeemail/{scout_id}','AccountsController@ChangeUserEmail');
Route::middleware('auth:api')->get('/mobile/changepassword/{scout_id}','AccountsController@ChangeUserPassword');
Route::middleware('auth:api')->post('/mobile/publishAnnouncement','UnitAnnouncementController@create');
Route::get('/mobile/getUnitAnnouncement','UnitAnnouncementController@getUnitAnnouncements');