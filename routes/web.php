<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// error route
Route::get('error/pagenotfound','ErrorController@pagenotFound')->name('notfound');

// User Routes
Route::group(['namespace'=>'User'],function(){

    // about route
    Route::get('user/about','PagesController@about')->name('about');

    // class route
    Route::get('user/class','PagesController@class')->name('class');

    // trainer route
    Route::get('user/trainer','PagesController@trainer')->name('trainer');

    // product route
    Route::get('user/product','PagesController@product')->name('product');

    // contact route
	Route::get('user/contact','ContactController@contact')->name('contact');

    Route::post('user/store','ContactController@store')->name('storecontact');

});

// Admin Routes
Route::group(['namespace'=>'Admin'],function(){

	  // home rouute
	  Route::get('admin/home','HomeController@index')->name('admin.home');

    // user route
    Route::resource('admin/user','UserController');

    // member routes
    Route::resource('admin/member','MemberController');

    Route::get('member/{id}/measurement','MemberController@measurement')->name('measurement');

    Route::get('member/{id}/attendance','MemberController@attendance')->name('attendance');

    Route::get('member/{id}/invoice','MemberController@invoice')->name('invoice');

    // membership route
    Route::resource('admin/membership','MembershipController');

    // class route
    Route::resource('admin/class','ClassController');

    Route::get('admin/schedule','ClassController@schedule')->name('schedule');

    // group route
    Route::resource('admin/group','GroupController');

    // attendance route
    Route::resource('admin/attendance','AttendanceController');

    // search viewattendance route
  	Route::post('admin/searchviewattendance','AttendanceController@searchviewAttendance')->name('searchviewattendance');

    // measurement route
    Route::resource('admin/measurement','MeasurementController');

    // invoice route
    Route::resource('admin/invoice','InvoiceController');

    // product route
    Route::resource('admin/product','ProductController');

    // equipment route
    Route::resource('admin/equipment','EquipmentController');

    // expense route
    Route::resource('admin/expense','ExpenseController');

    // permission route
    Route::resource('admin/permission','PermissionController');

    // role route
    Route::resource('admin/role','RoleController');

    // notice route
    Route::resource('admin/notice','NoticeController');

    // gallery route
    Route::resource('admin/gallery','GalleryController');

    // message route
    Route::resource('admin/message','MessageController');

    Route::get('message/sent','MessageController@sent')->name('sent');

    Route::get('message/{contact}/inbox','MessageController@inbox')->name('inbox'); 

    Route::get('inbox/{message}/delete','MessageController@delete')->name('delete');

    // event route
    Route::resource('admin/event','EventController');

    // day route
    Route::post('admin/day','DayController@store')->name('day');

    // profile route
    Route::get('admin/profile/{id}','ProfileController@profile')->name('profile');

    // find contact route
    Route::get('/findContact','MessageController@findContact');

    // change password routes
    Route::get('admin/changepassword','ChangeController@changePass')->name('changepass');

    Route::post('change/password','ChangeController@passChange')->name('passchange');

    // billing report routes
    Route::get('admin/billingreport','ReportController@billing')->name('billingreport');

    Route::post('admin/searchreport','ReportController@searchBilling')->name('searchreport');

    // expenses report routes
    Route::get('admin/expensesreport','ReportController@expense')->name('expensesreport');

	  Route::post('admin/expensesearchreport','ReportController@searchExpense')->name('expensesearchreport');

});
