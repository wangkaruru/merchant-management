<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/






Route::get('/', ['uses'=>'PartnerController@merchant']);
Route::post('/load_data', 'PartnerController@load_data');
Route::post('/create_merchant_customer', 'PartnerController@create_merchant_customer');




/*Route::get('/', function () {
    return view('login');
});
*/
/*Route::get('/login', function () {
    return view('login');
});
*/
/*Route::post('/changeLang', 'PartnerController@changeLang');

Route::post('/login', ['uses'=>'GeneralController@login']);
Route::get('/logout', ['uses'=>'GeneralController@logout']);
Route::post('/get_code', ['uses'=>'GeneralController@get_code']);

Route::post('/first_time', ['uses'=>'PartnerController@first_time']);
Route::post('/first_time_code', ['uses'=>'PartnerController@login_code']);
Route::post('/reset_my_password', ['uses'=>'PartnerController@reset_my_password']);

Route::get('/partner', ['uses'=>'PartnerController@dashboard']);
Route::post('/get_bal', ['uses'=>'PartnerController@get_bal']);
Route::post('/get_acc_details', ['uses'=>'PartnerController@get_acc_details']);

Route::get('/customeraccount', ['uses'=>'PartnerController@customeraccount']);
Route::post('/get_customer_acc_details', ['uses'=>'PartnerController@get_customer_acc_details']);

Route::get('/agentaccount', ['uses'=>'PartnerController@agentaccount']);
Route::post('/get_agent_acc_details', ['uses'=>'PartnerController@get_agent_acc_details']);

Route::get('/billeraccount', ['uses'=>'PartnerController@billeraccount']);
Route::post('/get_biller_acc_details', ['uses'=>'PartnerController@get_biller_acc_details']);


/*Route::get('/statement', ['uses'=>'PartnerController@statement']);*/
/*
Route::get('/profile', ['uses'=>'PartnerController@profile']);
Route::post('/change_pass', ['uses'=>'PartnerController@change_pass']);
Route::post('/change_pass_first', ['uses'=>'PartnerController@change_pass_first']);
Route::get('/account_activate', ['uses'=>'PartnerController@account_activate']);

Route::get('pdfview',array('as'=>'pdfview','uses'=>'PartnerController@pdfview'));
Route::get('/account', ['uses'=>'PartnerController@account']);
Route::post('/GetCustomerTransactionsByDate', ['uses'=>'PartnerController@GetCustomerTransactionsByDate']);

Route::get('/CreateDisbursement', ['uses'=>'PartnerController@create_disbursement']);
Route::get('/DisbursementHistory', ['uses'=>'PartnerController@DisbursementHistory']);
Route::post('/recent_disbursements', ['uses'=>'PartnerController@recent_disbursements']);

Route::post('/CreateDisbursement', ['uses'=>'PartnerController@do_create_disbursement']);
Route::post('/approve_disbursement', ['uses'=>'PartnerController@do_disburse']);
Route::post('/cancel_disbursement', ['uses'=>'PartnerController@cancel_disbursement']);




*/