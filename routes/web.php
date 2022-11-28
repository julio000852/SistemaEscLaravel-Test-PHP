<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\TurmController;
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

/*Login - Homa*/
Route::get('/', [LoginController::class, 'index'])->name('home.login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

/*Admin*/
Route::get('/list', [adminController::class, 'list'])->name('list');

/*ESCOLA*/
Route::get('/list/listSchool', [SchoolController::class, 'listSchool'])->name('list.school');
Route::get('/list/addSchool', [SchoolController::class, 'addSchool'])->name('list.addSchool');
Route::post('/list/addSchoolbank', [SchoolController::class, 'addSchoolbank'])->name('list.addSchoolbank');
Route::get('/editSchool/{id}', [SchoolController::class, 'editSchool'])->name('list.editSchool');
Route::post('/updateSchool/{id}', [SchoolController::class, 'updateSchool'])->name('list.updateSchool');
Route::get('/deleteSchool/{id}', [SchoolController::class, 'deleteSchool'])->name('list.deleteSchool');

/*TURMA*/
Route::get('/list/listturm', [TurmController::class, 'listturm'])->name('list.turm');
Route::get('/list/addTurm', [TurmController::class, 'addTurm'])->name('list.addTurm');
Route::post('/list/addTurmbank', [TurmController::class, 'addTurmbank'])->name('list.addTurmbank');
Route::get('/editTurm/{id}', [TurmController::class, 'editTurm'])->name('list.editTurm');
Route::post('/updateTurm/{id}', [TurmController::class, 'updateTurm'])->name('list.updateTurm');
Route::get('/deleteTurm/{id}', [TurmController::class, 'deleteTurm'])->name('list.deleteTurm');

/*PROFESSOR*/
Route::get('/list/listProf', [ProfController::class, 'listProf'])->name('list.prof');
Route::get('/list/addProf', [ProfController::class, 'addProf'])->name('list.addProf');
Route::post('/list/addProfbank', [ProfController::class, 'addProfbank'])->name('list.addProfbank');
Route::get('/editProf/{id}', [ProfController::class, 'editProf'])->name('list.editProf');
Route::post('/updateProf/{id}', [ProfController::class, 'updateProf'])->name('list.updateProf');
Route::get('/deleteProf/{id}', [ProfController::class, 'deleteProf'])->name('list.deleteProf');



