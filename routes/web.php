<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();


Route::get('/excel_import_view',   [TestController::class,'excel_import_view'])->name('excel_import_view');
Route::post('/import', [TestController::class, 'import'])->name('import');
Route::get('/number_of_joined/{id}',   [TestController::class,'number_of_joined'])->name('number_of_joined');
Route::get('/update_of_joined/{id}',   [TestController::class,'update_of_joined'])->name('update_of_joined');

Route::get('/home',   [TestController::class,'show_topics'])->middleware('auth')->name('show_topics');
Route::get('/',   [TestController::class,'show_topics'])->middleware('auth')->name('show_topics');

Route::get('/test',   [TestController::class,'show'])/* ->middleware('auth') */->name('test');
Route::get('/g_test',   [TestController::class,'g_show'])/* ->middleware('auth') */->name('g_test');
Route::get('/show_topics',   [TestController::class,'show_topics'])->middleware('auth')->name('show_topics');
Route::get('/show_test',   [TestController::class,'show_test'])->middleware('auth')->name('show_test');
Route::get('/show_all_tests',   [TestController::class,'show_all_tests'])->middleware('auth')->name('show_all_tests');
Route::get('/show_groups',   [TestController::class,'show_groups'])->middleware('auth')->name('show_groups');

Route::post('/add_topic',   [TestController::class,'add_topic'])->middleware('auth')->name('add_topic');
Route::post('/add_q',   [TestController::class,'add_q'])->middleware('auth')->name('add_q');
Route::get('/delete_q',   [TestController::class,'delete_q'])->middleware('auth')->name('delete_q');
Route::get('/edit_q',   [TestController::class,'edit_q'])->middleware('auth')->name('edit_q');
Route::post('/edit_q_action',   [TestController::class,'edit_q_action'])->middleware('auth')->name('edit_q_action');

Route::get('/delete_topic',   [TestController::class,'delete_topic'])->middleware('auth')->name('delete_topic');
Route::get('/create_group',   [TestController::class,'create_group'])/* ->middleware('auth') */->name('create_group');
Route::get('/get_group',   [TestController::class,'get_group'])/* ->middleware('auth') */->name('get_group');
Route::get('/save_g_result',   [TestController::class,'save_g_result'])/* ->middleware('auth') */->name('save_g_result');
Route::get('/show_g_result',   [TestController::class,'show_g_result'])/* ->middleware('auth') */->name('show_g_result');
Route::get('/topics',   [TestController::class,'topics'])/* ->middleware('auth') */->name('topics');
Route::get('/edit_dept',   [TestController::class,'edit_dept'])->middleware('auth')->name('edit_dept');
Route::post('/edit_dept_action',   [TestController::class,'edit_dept_action'])->middleware('auth')->name('edit_dept_action');
Route::get('/delete_g',   [TestController::class,'delete_g'])->middleware('auth')->name('delete_g');
Route::get('/vister_counter',   [TestController::class,'vister_counter'])/* ->middleware('auth') */->name('vister_counter');
