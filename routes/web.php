<?php

use Illuminate\Support\Facades\Route;




Route::get('/icons', function () {
    return view('icons');
});

Route::get('/sendemail', 'SendEmailController@index');
Route::post('/sendemail/send', 'SendEmailController@send');




Route::get('/chat/online-state', 'OnlineController@checkStates');





Route::get('/ps', function () {
    return view('ps');
});

Route::get('/lang/{lang}', 'LanguageController@setLanguage');
Route::group(['middleware' => 'Lang'], function () {


    Route::post('/site-reviews', 'ReviewController@addReview');



    // services
    Route::prefix('services')->group(function () {


        Route::post('/{id}/comments', 'ServiceController@addComment');
        Route::get('/', 'ServiceController@fetchAll');
        Route::get('/new-services', 'ServiceController@fetchNewServices');
        Route::post('/add_new_service', 'ServiceController@addService');
        Route::post('/{id}', 'ServiceController@updateService');
        Route::post('/{id}/accept', 'ServiceController@acceptService');
        Route::get('/{id}', 'ServiceController@fetchService');
        Route::delete('/{id}', 'ServiceController@delete');
        Route::put('/{id}', 'ServiceController@updateAvailability');
    });




    Route::prefix('ads')->group(function () {
        Route::get('/', 'AdController@loadAds');
        Route::get('/{id}', 'AdController@loadOneAd');
        Route::put('/{id}', 'AdController@updateAd');
        Route::delete('/{id}', 'AdController@deleteAd');
    });






    // currencies

    Route::prefix('currencies')->group(function () {
        Route::get('/', 'CurrencyController@loadCurrencies');
        Route::post('/', 'CurrencyController@addCurrency');
        Route::post('/{id}', 'CurrencyController@updateCurrency');
        Route::delete('/{id}', 'CurrencyController@deleteCurrency');
    });



    // credit

    Route::prefix('credits')->group(function () {
        Route::get('/', 'CreditController@loadCredits');
        Route::post('/', 'CreditController@addCredit');
        Route::post('/{id}', 'CreditController@updateCredit');
        Route::delete('/{id}', 'CreditController@deleteCredit');
    });






    // chat
    Route::prefix('chat')->group(function () {
        // fetch conversations
        Route::get('/conversations', 'ChatMessageController@fetchConversations');
        Route::get('/conversations/admin', 'ChatMessageController@fetchAllForAdmin');
        // open conversation
        Route::get('/conversations/{conversation_id}/partner/{partner_id}', 'ChatMessageController@fetchOneConversation');
        // add reply + new replies + previous replies
        Route::post('/conversations/{conversation_id}', 'ChatMessageController@addReplyToConversation');
        Route::get('/conversations/new_replies/{conversation_id}/{last_partner_reply}', 'ChatMessageController@checkForPartnerReplies');
        Route::get('/conversations/previous_replies/{conversation_id}/{top_reply}', 'ChatMessageController@loadPreviousReplies');
        Route::get('/conversations/admin/read/{conversation_id}', 'ChatMessageController@fetchOneConversationForAdmin');

        Route::post('/conversations/{conversation_id}/add_image', 'ChatMessageController@addImage');
    });





    // site pages

    // terms & conditions
    Route::get('/all-sellers', 'SitePagesController@allSellers');

    // terms & conditions
    Route::get('/account/{id}', 'SitePagesController@userProfile');


    // terms & conditions
    Route::get('/terms-conditions', 'SitePagesController@termsAndConditions');

    // privacy & policy
    Route::get('/privacy-policy', 'SitePagesController@privacyAndPolicy');

    // user services
    Route::get('/my_services', 'SitePagesController@userServices');

    // my orders
    Route::get('/my_orders', 'SitePagesController@userOrders');

    // cashier
    Route::get('/cashier', 'SitePagesController@userCashier');


    // my_complaints
    Route::get('/my_complaints', 'SitePagesController@userComplaints');

    // complaints
    Route::get('/complaints/{id}', 'SitePagesController@viewComplaint');

    // add service page
    Route::get('/add_service', 'SitePagesController@addService');


    //home page
    Route::get('/', 'SitePagesController@home');
    Route::get('/home', 'SitePagesController@home');


    // search page
    Route::post('/search', 'SitePagesController@search');


    // common-questions
    Route::get('/common-questions', 'SitePagesController@questions');

    // all-services
    Route::get('/all-services', 'SitePagesController@services');


    // offer page
    Route::get('/services/{id}/{slug}', 'SitePagesController@service');
    Route::get('/services/{id}/{slug}/edit', 'SitePagesController@editService');



    // make order
    Route::get('/make-order/{id}/{slug}', 'SitePagesController@makeOrder');


    // account-settings
    Route::get('/account-settings', 'SitePagesController@accountSettings');

    Route::put('/settings/social', 'SettingController@updateSocial');
    Route::put('/settings/contact', 'SettingController@updateContact');
    Route::put('/settings/about', 'SettingController@updateAbout');



    Route::prefix('issues')->group(function () {

        Route::get('/', 'OrderIssueController@fetchAll');
        Route::delete('/{id}', 'OrderIssueController@deleteIssue');

        Route::post('/{id}/reply', 'IssueCommentController@addReply');

        Route::get('{issue_id}/new-comments', 'IssueCommentController@checkForNewComments');
        Route::post('{issue_id}/close', 'OrderController@closeIssue');
    });

    Route::prefix('orders')->group(function () {

        Route::get('{order_id}/new-comments', 'OrderController@checkForNewComments');
        Route::get('/{id}', 'OrderController@viewOrder');

        Route::post('/{id}', 'OrderController@create');
        Route::post('/{id}/reply', 'OrderController@addReply');
        Route::post('/{id}/rate', 'OrderController@rateOrder');
        Route::post('/{id}/issue', 'OrderController@submitIssue');
        Route::put('/{id}/state', 'OrderController@updateState');

        /* 
        Route::get('/{id}', 'NotificationController@read');
        Route::put('/{id}', 'NotificationController@update');
        Route::delete('/{delete_token}', 'NotificationController@delete'); */
    });


    // auth
    Route::get('/admin', function () {
        return redirect('/users/login');
    }); /* short link for admins */

    Route::namespace('Auth')->prefix('users')->group(function () {
        Route::get('/register', 'RegisterController@show');
        Route::post('/register', 'RegisterController@store');


        Route::get('/register/email/verification/{email}', 'RegisterController@showVerification');
        Route::get('/register/email/verification/{email}/resend', 'RegisterController@resendVerification');
        Route::post('/register/email/verification', 'RegisterController@activateAccount');

        Route::get('/login', 'LoginController@show')->name('login');
        Route::post('/login', 'LoginController@store');

        Route::get('/login/forget-password', 'LoginController@forgetPasswordView');
        Route::post('/login/forget-password/verify', 'LoginController@forgetPasswordSendVerification');
        Route::get('/login/forget-password/verify/{email}/resend', 'LoginController@forgetPasswordResendVerification');
        Route::get('/login/forget-password/verify/{email}', 'LoginController@forgetPasswordVerifyView');
        Route::post('/login/forget-password/verify/{email}', 'LoginController@forgetPasswordVerify');

        Route::post('/logout', 'LoginController@logout');
    });


    // dashboard
    Route::get('/dashboard', 'DashBoardController@assignDashboard'); // admin or user

    //email

    Route::get('/email/{id}', 'NotificationController@emailNotifications'); // admin or user



    // users
    Route::prefix('users')->group(function () {
        Route::post('/update-location', 'UserController@updateLocation');
        Route::post('/update-info', 'UserController@updateInfo');
        Route::get('/', 'UserController@allUsers'); // admin only
        Route::delete('/{id}', 'UserController@delete'); // admin only
        Route::put('/{id}/state', 'UserController@changeState'); // admin only
        Route::put('/{id}/varification', 'UserController@changeVerification'); // admin only
        Route::post('/{id}/account_type', 'UserController@changeAccountType'); // admin only
        Route::put('/{id}/password', 'UserController@changePassword'); // admin + user
        Route::post('/profile-picture', 'UserController@changeProfilePicture'); // admin + user
    });



    Route::prefix('messages')->group(function () {
        Route::get('/', 'MessageController@fetch');
        Route::post('/', 'MessageController@store');
        Route::get('/{id}', 'MessageController@read');
        Route::delete('/{id}', 'MessageController@delete');
    });


    Route::prefix('notifications')->group(function () {
        Route::get('/', 'NotificationController@fetch');
        Route::post('/', 'NotificationController@store');
        Route::get('/{id}', 'NotificationController@read');
        Route::put('/{id}', 'NotificationController@update');
        Route::delete('/{delete_token}', 'NotificationController@delete');
    });

    Route::get('/user/notifications/', 'NotificationController@userNotifications');
    Route::get('/user/notifications/{id}', 'NotificationController@userOpenNotification');
    Route::get('/notifications-center', 'NotificationController@notificationsCenter');



    Route::prefix('meta_tags')->group(function () {
        Route::get('/', 'MetaTagController@fetch');
        Route::post('/', 'MetaTagController@store');
        Route::put('/{id}', 'MetaTagController@update');
        Route::get('/{id}', 'MetaTagController@fetchOne');
        Route::delete('/{id}', 'MetaTagController@delete');
    });




    Route::prefix('questions')->group(function () {
        Route::get('/', 'QuestionController@fetch');
        Route::post('/', 'QuestionController@store');
        Route::delete('/{id}', 'QuestionController@delete');
        Route::get('/{id}', 'QuestionController@fetchOne');
        Route::put('/{id}', 'QuestionController@update');
    });
});
