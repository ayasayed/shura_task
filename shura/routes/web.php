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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', function () {
    return view('login');});
Route::post('/checklogin','logincontroller@checklogin');
Route::get('/successlogin/{name}','logincontroller@successlogin')->middleware('checkuser');

Route::get('/logout','logincontroller@logout');

Route::post('/successlogin/addNewEmp','profilecontroller@addNewEmp');
Route::get('/successlogin/delete/{id}','profilecontroller@delete');

Route::get('/successlogin/edit/{id}','profilecontroller@edit');

Route::post('/successlogin/edit/{id}','profilecontroller@edit');

