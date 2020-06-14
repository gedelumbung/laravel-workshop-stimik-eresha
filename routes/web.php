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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/students', 'StudentController@index')->name('students.index');
Route::get('/students/add', 'StudentController@add')->name('students.add');
Route::get('/students/edit/{id}', 'StudentController@edit')->name('students.edit');
Route::post('/students/save', 'StudentController@save')->name('students.save');
Route::get('/students/delete/{id}', 'StudentController@delete')->name('students.delete');

Route::get('/students/{id}/grades', 'StudentController@grades')->name('students.grades');
Route::get('/students/{id}/grades/add', 'StudentController@addGrade')->name('students.add_grade');
Route::get('/students/{id}/grades/edit/{grade_id}', 'StudentController@editGrade')->name('students.edit_grade');
Route::post('/students/{id}/grades/save', 'StudentController@saveGrade')->name('students.save_grade');
Route::get('/students/{id}/grades/delete/{grade_id}', 'StudentController@deleteGrade')->name('students.delete_grade');
