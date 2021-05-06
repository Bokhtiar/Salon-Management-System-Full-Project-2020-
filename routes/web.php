<?php

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


Auth::routes();

Route::group(["middleware"=>'auth'],function(){


Route::get('/', 'admin\adminDashboardController@index');
Route::get('/home', 'HomeController@index')->name('home');


Route::group(["as"=>'admin.', "prefix"=>'admin',"namespace"=>'admin',"middleware"=>['auth']],function(){
  Route::group(["as"=>'employee.',"prefix"=>'employee'],function(){
    Route::get('all-employee','EmployeeController@index')->name('all-employee');
    Route::get('add-employee','EmployeeController@create')->name('add-employee');
    Route::post('store-employee','EmployeeController@store')->name('store-employee');
    Route::get('inactive-employee/{id}','EmployeeController@inactive');
    Route::get('single-profile-employee/{id}','EmployeeController@profile');
    Route::get('active-employee/{id}','EmployeeController@active');
    Route::get('edit-employee/{id}','EmployeeController@edit');
    Route::post('update-employee/{id}','EmployeeController@update');
    Route::get('delete-employee/{id}','EmployeeController@destroy');
  }); //employee routes end

    Route::get('fullcalendar', 'EmployeeController@calendar')->name('fullcalendar');
    Route::get('all/customers/{date}', 'EmployeeController@allCustomers');
    Route::get('viewcustomers', 'EmployeeController@viewCustomers');
    Route::get('calendarValue', 'EmployeeController@calendarData')->name('calendarValue');
    Route::get('calendarCustomer', 'EmployeeController@calendarCustomer')->name('calendarCustomer');

  Route::group(["as"=>'customer.',"prefix"=>'customer'],function(){
    Route::get('all-customer','CustomerController@index')->name('all-customer');
    Route::get('add-customer','CustomerController@create')->name('add-customer');
    Route::post('store-customer','CustomerController@store')->name('store-customer');
    Route::post('store-app-customer','CustomerController@app_store');
    Route::get('inactive-customer/{id}','CustomerController@inactive');
    Route::get('single-profile-customer/{id}','CustomerController@profile');
    Route::get('active-customer/{id}','CustomerController@active');
    Route::get('edit-customer/{id}','CustomerController@edit');
    Route::post('update-customer/{id}','CustomerController@update');
    Route::get('delete-customer/{id}','CustomerController@destroy');
    Route::post('search-date','CustomerController@search');
    Route::post('search-customer','CustomerController@search_customer_appointment');//existing customer new appointment route
    Route::get('appointment-edit-customer/{id}','CustomerController@appointment_edit_customer');
    Route::get('all-app','CustomerController@all_app');
    
    
  });//customer routes end


  Route::group(["as"=>'todo.',"prefix"=>'todo'],function(){
    Route::get('all-todo','TodoController@index')->name('all-todo');
    Route::get('add-todo','TodoController@create')->name('add-todo');
    Route::post('store-todo','TodoController@store')->name('store-todo');
    Route::get('inactive-todo/{id}','TodoController@inactive');
    Route::get('active-todo/{id}','TodoController@active');
    Route::get('edit-todo/{id}','TodoController@edit');
    Route::post('update-todo/{id}','TodoController@update');
    Route::get('delete-todo/{id}','TodoController@destroy');
  });//todo routes end


  Route::group(["as"=>'setting.',"prefix"=>'setting'],function(){
    Route::get('update-profile','SettingsController@update_profile')->name('update-profile');
    Route::post('store-update-profile/{id}','SettingsController@store_update');
    Route::get('reset-passsword','SettingsController@reset_passsword')->name('reset-passsword');
    Route::post('change-password','SettingsController@change_password');
    Route::get('new-admin','SettingsController@new_admin'); 
    Route::get('logout','SettingsController@logout');
    Route::post('store','SettingsController@store');
  });//setting routes end
    Route::post('search','adminDashboardController@search');
    Route::get('all-admin','adminDashboardController@all_admin');
  });
  
  
});

