<?php

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

Route::get('test', function () {
//    dd(bcrypt('admin'));

    Mail::send('emails.send', ['title' => 'test', 'content' => 'dhfgrb'], function ($message) {
        $message->from('petersonben45@gmail.com', 'fgfdgfh');

        $message->to('petersonben45@gmail.com');

    });

});

Route::get('/', function () {
    return view('index');
});

//Route::get('customer-submission', function () {
//    return view('customer_submission');
//});
Route::get('associate-feedback', function () {
    return view('associate_feedback');
});

Route::get('netwurxs-associates', function () {
    return view('netwurxs_associates');
});
Route::get('/home', 'HomeController@index');

Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register');


Route::get('netwurxs-associates', 'NetwurxsAssociates\AuthController@getRegView');
Route::post('associates/register', 'NetwurxsAssociates\AuthController@register');


Route::get('customer-submission', 'Customers\AuthController@getRegView');
Route::post('customer/register', 'Customers\AuthController@register');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('login', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    Route::get('register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('register', 'Auth\RegisterController@register');


    Route::group(['middleware' => 'authenticate:admin'], function () {
       
        Route::get('/', 'DashboardController@index');

        Route::get('customers', 'CustomerController@index');
        Route::get('customers/{id}', 'CustomerController@getCustomer');
        Route::get('customers/activate/{id}', 'CustomerController@activate');
        Route::get('customers/reject/{id}', 'CustomerController@reject');


        Route::get('associates', 'AssociateController@index');
        Route::get('associates/{id}', 'AssociateController@getAssociate');
        Route::get('associates/activate/{id}', 'AssociateController@activate');
        Route::get('associates/reject/{id}', 'AssociateController@reject');

    });


});