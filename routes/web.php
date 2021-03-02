<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::post('/health-login', 'HealthLogin@healthLogin')->name('health-login');
Route::get('/health-dashboard', 'Dashboard@healthMain')->name('health-dashboard');
Route::get('/get-headers', 'HealthController@getHeaders')->name('get-headers');

//Assign results
Route::get('/get-patient-test', 'HealthController@getPatientTest')->name('get-patient-test');
Route::post('/get-tests', 'HealthController@getTests')->name('get-tests');
Route::get('/update-tests/{id}/{testName}/{testTypeId}', 'HealthController@updateTests')->name('update-tests');
Route::post('/save-updates', 'HealthController@saveUpdates')->name('save-updates');
Route::post('/save-updates-retest', 'HealthController@saveUpdatesRetest')->name('save-updates-retest');
Route::post('/get-labs', 'HealthController@getLabs')->name('get-labs');
Route::post('/approve-test', 'HealthController@approveTest')->name('approve-test');
Route::get('/get-bill-tests', 'HealthController@getBillTest')->name('get-bill-tests');
Route::post('/post-bill-tests', 'HealthController@postBillTests')->name('post-bill-tests');
Route::post('/approve-test', 'HealthController@approveTests')->name('approve-test');
Route::post('/approve-print', 'HealthController@approvePrint')->name('approve-print');
Route::get('/signature', 'HealthController@signature')->name('signature');
Route::post('/upload-signature', 'HealthController@uploadSignature')->name('upload-signature');
//V2
Route::get('/get-all-test', 'HealthController@getTestsById')->name('get-all-test');
Route::get('/doctor-updates', 'HealthController@docUpdateTest')->name('doctor-updates');
Route::get('/hit-map', 'HealthController@hitMap')->name('hit-map');
Route::post('/hit-map', 'HealthController@pullHitMap')->name('hit-map');

//Reports

Route::get('/health-reports', 'HealthRptController@index')->name('health-reports');
Route::get('/health-transactions', 'HealthRptController@healthTransactions')->name('health-transactions');
Route::post('/health-transactions', 'HealthRptController@healthPostTransactions')->name('health-transactions');
Route::post('/health-reports', 'HealthRptController@indexFilter')->name('health-reports');
Route::get('/get-approved', 'HealthRptController@getApproved')->name('get-approved');
Route::get('/get-all-approved', 'HealthRptController@getAllApproved')->name('get-all-approved');





//profile
Route::get('/health-profile', 'HealthController@profile')->name('health-profile');
Route::post('/health-change-password', 'HealthController@ChangePassword')->name('health-change-password');
//test kits
Route::get('/test-kits', 'HealthController@testKits')->name('test-kits');
Route::post('/save-kits', 'HealthController@saveKits')->name('save-kits');
//forgot passwprd
Route::get('/health-forgot-password', 'HealthLogin@HealthForgotPassword')->name('health-forgot-password');
Route::post('/forgot-password', 'HealthLogin@ForgotPassword')->name('forgot-password');
//Support
Route::get('/support', 'SupportController@Support')->name('support');
Route::post('/pull-receipt', 'SupportController@pullReceipt')->name('pull-receipt');



Route::post('/update-individual-number', 'SupportController@updateIndividualNumber')->name('update-individual-number');
Route::post('/update-individual-name', 'SupportController@updateIndividualName')->name('update-individual-name');
Route::post('/merge-status', 'SupportController@mergeStatus')->name('merge-status');



Route::get('/support-mobile', 'SupportController@supportMobile')->name('support-mobile');
Route::post('/save-mobile', 'SupportController@saveMobile')->name('save-mobile');
Route::get('/get-bill-by-id', 'SupportController@getBillById')->name('get-bill-by-id');
Route::post('/get-bill-details', 'SupportController@getBillDetails')->name('get-bill-details');
Route::get('/get-individual-name', 'SupportController@getIndividualName')->name('get-individual-name');
Route::post('/get-individual-name', 'SupportController@postIndividualName')->name('get-individual-name');
//update-individual-corporate
Route::post('/update-individual-corporate', 'SupportController@updateIndividualCorporate')->name('update-individual-corporate');




//corporate reports
Route::get('/active-certs', 'CorporateRptController@activeCerts')->name('active-certs');
Route::get('/nonactive-certs', 'CorporateRptController@nonactiveCerts')->name('nonactive-certs');
Route::get('/cert-expiry-30-days', 'CorporateRptController@certExpiry30Days')->name('cert-expiry-30-days');
Route::get('/active-licenses', 'CorporateRptController@activeLicenses')->name('active-licenses');
Route::get('/nonactive-licenses', 'CorporateRptController@nonactiveLicenses')->name('nonactive-licenses');
Route::get('/licenses-expiry-30-days', 'CorporateRptController@licenseExpiry30Days')->name('licenses-expiry-30-days');

//Health Biller
Route::get('/health-biller', 'HealthBillerController@index')->name('health-biller');
Route::get('/health-register', 'HealthBillerController@healthClient')->name('health-register');
Route::get('get-wards', 'HealthBillerController@getWards')->name('get-wards');
Route::post('register-food-handler', 'HealthBillerController@registerFoodHandler')->name('register-food-handler');
Route::get('get-foodhandler-bill/{id}', 'HealthBillerController@getFoodHandlerBill')->name('get-foodhandler-bill');
Route::get('print-food-handler-bill/{idNo}', 'HealthBillerController@printFoodHandlerBill')->name('print-food-handler-bill');
Route::post('pay-food-hygiene-bill', 'HealthBillerController@payFoodHygiene')->name('pay-food-hygiene-bill');
Route::get('get-food-hygiene-receipt/{id}', 'HealthBillerController@getFoodHygieneReceipt')->name('get-food-hygiene-receipt');
Route::get('handler-printables/{id}', 'HealthBillerController@handlerPrints')->name('handler-printables');
Route::get('food-hygiene-business-details', 'HealthBillerController@FoodHygieneBusinessDetails')->name('food-hygiene-business-details');


//renewal
Route::get('renew-handler', 'HealthBillerController@renewHandler')->name('renew-handler');
Route::post('rnw-food-handler', 'HealthBillerController@renewFoodHandler')->name('rnw-food-handler');
//food hygiene
Route::get('hygiene', 'HealthBillerController@hygieneBusiness')->name('hygiene');
Route::post('pull-business-details', 'HealthBillerController@PullBusinessDetails')->name('pull-business-details');
Route::post('register-food-hygiene', 'HealthBillerController@registerFoodHygiene')->name('register-food-hygiene');
Route::get('get-health-bill/{id}', 'HealthBillerController@getFoodHygieneBill')->name('get-health-bill');
Route::get('print-food-hygiene-bill/{businessID}', 'HealthBillerController@printFoodHygieneBill')->name('print-food-hygiene-bill');
Route::post('pay-food-hygiene-bill', 'HealthBillerController@payFoodHygiene')->name('pay-food-hygiene-bill');

Route::get('hygiene-printables/{id}', 'HealthBillerController@hygienePrints')->name('hygiene-printables');
Route::post('print-food-hygiene-cert', 'HealthBillerController@printFoodHygieneCert')->name('print-food-hygiene-cert');
Route::get('renew-food-hygiene', 'HealthBillerController@renewForm')->name('renew-food-hygiene');
Route::post('rnw-food-hygiene', 'HealthBillerController@renewFoodHygiene')->name('rnw-food-hygiene');
//Corporate
Route::get('corporate', 'HealthBillerController@GetCorporate')->name('corporate');
Route::post('get-corporate-individuals', 'HealthBillerController@getCorporateIndividuals')->name('get-corporate-individuals');
Route::get('add-corporate-individual', 'HealthBillerController@addIndivCorporate')->name('add-corporate-individual');
Route::get('upload-individual', 'HealthBillerController@uploadCorpIndiv')->name('upload-individual');
Route::post('get-corporate-bill', 'HealthBillerController@getCorporateBill')->name('get-corporate-bill');
Route::post('bill-selected', 'HealthBillerController@getSelectedBill')->name('bill-selected');
Route::post('get-corporate-cert', 'HealthBillerController@getCorporateCert')->name('get-corporate-cert');
Route::post('suspend-individual', 'HealthBillerController@suspendCorporateIndvi')->name('suspend-individual');
Route::get('print-multi-handler-bill/{idNo}', 'HealthBillerController@multiFoodHandlerBill')->name('print-multi-handler-bill');
Route::get('get-corporate-individual/{id}', 'HealthBillerController@getCorporateIndividuals')->name('get-corporate-individual');
Route::get('corporate-bookings', 'HealthBillerController@corporateBookings')->name('corporate-bookings');



Route::get('/receipts', 'CorporateRptController@receipts')->name('receipts');
Route::get('/health-bills', 'CorporateRptController@healthBill')->name('health-bills');
//retest
Route::get('/retest', 'HealthBillerController@reTest')->name('retest');
Route::post('health-retest', 'HealthBillerController@healthRetest')->name('health-retest');
//System settings
Route::get('/config', 'HealthController@Config')->name('config');
Route::post('/save-faclab', 'HealthController@saveFacLab')->name('save-faclab');

//bookings

Route::get('/get-inspection', 'HealthBillerController@getInspection')->name('get-inspection');
Route::get('/health-approvals', 'HealthBillerController@healthApprovals')->name('health-approvals');
Route::get('/get-tests-done', 'HealthBillerController@getHealthTests')->name('get-tests-done');
Route::get('/get-doc-approvals', 'HealthBillerController@getApprovedTests')->name('get-doc-approvals');






Route::get('/bookings', 'HealthBillerController@bookings')->name('bookings');
Route::post('/bookings', 'HealthBillerController@postBookings')->name('bookings');
Route::post('/save-booking-confirmation', 'HealthController@saveBookingConfirmation')->name('save-booking-confirmation');

Route::get('/users', 'HealthBillerController@users')->name('users');
Route::post('/save-user', 'HealthController@saveUser')->name('save-user');
Route::post('/delete-user', 'HealthController@deleteUser')->name('delete-user');
Route::get('/overdue-test', 'HealthBillerController@overdueTest')->name('overdue-test');

//Inspections
Route::get('/get-inspections', 'HealthBillerController@getInspections')->name('get-inspections');
Route::post('/get-inspections', 'HealthBillerController@postInspections')->name('get-inspections');
Route::post('/update-inspection', 'HealthController@updateInspection')->name('update-inspection');
Route::get('/inspected', 'HealthBillerController@Inspected')->name('inspected');
Route::post('/update-inspector', 'HealthController@updateInspector')->name('update-inspector');
Route::post('/update-costing', 'HealthController@updateCosting')->name('update-costing');
Route::get('/approval', 'HealthBillerController@Approval')->name('approval');
Route::post('/update-approvals', 'HealthController@updateApprovals')->name('update-approvals');
Route::get('/inspection-results', 'HealthBillerController@inspectionResults')->name('inspection-results');



Route::get('/approved-inspections', 'HealthBillerController@approvedInspections')->name('approved-inspections');

