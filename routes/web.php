<?php

use App\User;

Route::get('/', function () {
    return redirect()->route('login');
});


/*
|--------------------------------------------------------------------------
| Auth Controller
|--------------------------------------------------------------------------
|
| 
|
*/

Route::group(['prefix'=> 'auth'], function(){

	Route::get('/login', [
		'as'=> 'login',
		'uses'=> 'AuthController@login'
	]);

	Route::post('/logincheck', [
		'as'=> 'login_check',
		'uses'=> 'AuthController@login_check'
	]);
});


/*
|--------------------------------------------------------------------------
| Nurse Controller
|--------------------------------------------------------------------------
|
| 
|
*/
Route::group(['prefix'=> 'nurse'], function(){

	Route::get('/logout', [
		'as'=> 'nurse_logout',
		'uses'=> 'NurseController@nurse_logout'
	]);

	Route::get('/main', [
		'as'=> 'nurse_main',
		'uses'=> 'NurseController@nurse_main'
	]);

	Route::get('/patient-{id}-info/', [
		'as'=> 'nurse_patient_info',
		'uses'=> 'NurseController@nurse_patient_info'
	]);

	Route::get('/patient-{id}/transaction-history', [
		'as'=> 'nurse_patient_transaction',
		'uses'=> 'NurseController@nurse_patient_transaction'
	]);

	Route::get('/patient-{id}/consultation', [
		'as'=> 'nurse_patient_transaction_consultation',
		'uses'=> 'NurseController@nurse_patient_transaction_consultation'
	]);

	Route::get('/patient-{id}/referral', [
		'as'=> 'nurse_patient_transaction_referral',
		'uses'=> 'NurseController@nurse_patient_transaction_referral'
	]);

	Route::get('/transaction/{id}/{user_id}', [
		'as'=> 'nurse_transaction',
		'uses'=> 'NurseController@nurse_transaction'
	]);

	Route::get('/appointment', [
		'as'=> 'nurse_appointment',
		'uses'=> 'NurseController@nurse_appointment'
	]);

	Route::get('/staff-list', [
		'as'=> 'nurse_staff_list',
		'uses'=> 'NurseController@nurse_staff_list'
	]);


	Route::post('/admission/check/{id}/{user_id}', [
		'as'=> 'nurse_admission_check',
		'uses'=> 'NurseController@nurse_admission_check'
	]);

	Route::post('/consultation/check/{id}/{user_id}', [
		'as'=> 'nurse_consultation_check',
		'uses'=> 'NurseController@nurse_consultation_check'
	]);

	Route::post('/referral/check/{id}/{user_id}', [
		'as'=> 'nurse_referal_check',
		'uses'=> 'NurseController@nurse_referal_check'
	]);

	Route::get('/new-patient', [
		'as'=> 'nurse_new_patient',
		'uses'=> 'NurseController@nurse_new_patient'
	]);

	Route::post('/new-patient', [
		'as'=> 'nurse_new_patient_check',
		'uses'=> 'NurseController@nurse_new_patient_check'
	]);

	Route::get('/new-appontment', [
		'as'=> 'nurse_new_appointment',
		'uses'=> 'NurseController@nurse_new_appointment'
	]);

	Route::post('/add-new-appointment', [
		'as'=> 'nurse_add_new_appointment',
		'uses'=> 'NurseController@nurse_add_new_appointment'
	]);

	Route::post('/search', [
		'as'=> 'nurse_search',
		'uses'=> 'NurseController@nurse_search'
	]);
});
/*
|--------------------------------------------------------------------------
| Admin Controller
|--------------------------------------------------------------------------
|
| 
|
*/

Route::group(['prefix'=> 'admin'], function(){

	Route::get('/main', [
		'as'=> 'admin_main',
		'uses'=> 'AdminController@admin_main'
	]);

	Route::get('/logout', [
		'as'=> 'admin_logout',
		'uses'=> 'AdminController@admin_logout'
	]);

	Route::get('/new-staff', [
		'as'=> 'admin_new_staff',
		'uses'=> 'AdminController@admin_new_staff'
	]);

	Route::post('/new-staff', [
		'as'=> 'admin_new_staff_check',
		'uses'=> 'AdminController@admin_new_staff_check'
	]);
});




Route::get('/addUser', function(){

	$nurse = new User;
	$nurse->fname = 'cliford';
	$nurse->lname = 'makarate';
	$nurse->dob = '12-12-2018';
	$nurse->contact = '33213123213';
	$nurse->username = 'admin';
	$nurse->password = bcrypt('admin');
	$nurse->role_id = 1;
	$nurse->save();
});