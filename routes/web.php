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
    dd(bcrypt('user'));

    Mail::send('emails.send', ['title' => 'test', 'content' => 'dhfgrb'], function ($message) {
        $message->from('petersonben45@gmail.com', 'fgfdgfh');

        $message->to('petersonben45@gmail.com');

    });

});



//Route::get('customer-submission', function () {
//    return view('customer_submission');
//});
Route::get('associate-feedback', function () {
    return view('associate_feedback');
});

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::post('contact','HomeController@contact');

Route::post('login', 'Auth\LoginController@login');
Route::get('logout/{user}', 'Auth\LoginController@logout');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register');

//associate authentication
Route::post('associates/login', 'NetwurxsAssociates\LoginController@login');
Route::get('netwurxs-associates', 'NetwurxsAssociates\AuthController@getRegView');
Route::get('associates/logout', 'NetwurxsAssociates\LoginController@logout');
Route::post('associates/register', 'NetwurxsAssociates\AuthController@register');

//customer authentication
Route::get('customers/login', 'Customers\LoginController@showLoginForm');
Route::post('customers/login', 'Customers\LoginController@login');
Route::get('customer-submission', 'Customers\AuthController@getRegView');
Route::post('customer/register', 'Customers\AuthController@register');
Route::get('customers/logout', 'Customers\LoginController@logout');



Route::group(['prefix' => 'customer', 'namespace' => 'Customers', 'middleware'=> 'authenticate:customer'],function (){
    Route::get('dashboard','DashboardController@index');
    Route::get('/','DashboardController@index');
});


Route::group(['prefix' => 'associate', 'namespace' => 'NetwurxsAssociates', 'middleware'=> 'authenticate:associate'],function (){
    Route::get('dashboard','DashboardController@index');
    Route::get('/','DashboardController@index');
});



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
        Route::get('customers/reject/{id}/{current_page}', 'CustomerController@reject');
        Route::get('customers/download/{id}', 'CustomerController@download');


        Route::get('associates', 'AssociateController@index');
        Route::get('associates/{id}', 'AssociateController@getAssociate');
        Route::get('associates/activate/{id}', 'AssociateController@activate');
        Route::get('associates/reject/{id}/{current_page}', 'AssociateController@reject');
        Route::get('associates/download/{id}', 'AssociateController@download');

        Route::get('industries','IndustryController@index');
        Route::get('industries/create','IndustryController@create');
        Route::post('industries/store','IndustryController@store');
        Route::get('industries/delete/{id}/{current_page}','IndustryController@remove');
        
        
        
        Route::get('contact-details','ContactDetailsController@index');
        Route::post('contact-details/update/{field}','ContactDetailsController@update');

    });


});