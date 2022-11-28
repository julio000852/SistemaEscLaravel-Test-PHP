<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\LoginController;
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

/*LOGIN*/
Route::get('/', [LoginController::class, 'index'])->name('home.login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

/*HOME*/
Route::get('/list', [adminController::class, 'list'])->name('list');

/*ESCOLA*/
Route::get('/list/listSchool', [adminController::class, 'listSchool'])->name('list.school');
Route::get('/list/addSchool', [adminController::class, 'addSchool'])->name('list.addSchool');
Route::post('/list/addSchoolbank', [adminController::class, 'addSchoolbank'])->name('list.addSchoolbank');
Route::get('/editSchool/{id}', [adminController::class, 'editSchool'])->name('list.editSchool');
Route::post('/updateSchool/{id}', [adminController::class, 'updateSchool'])->name('list.updateSchool');
Route::get('/deleteSchool/{id}', [adminController::class, 'deleteSchool'])->name('list.deleteSchool');

/*TURMA*/
Route::get('/list/listturm', [adminController::class, 'listturm'])->name('list.turm');
Route::get('/list/addTurm', [adminController::class, 'addTurm'])->name('list.addTurm');
Route::post('/list/addTurmbank', [adminController::class, 'addTurmbank'])->name('list.addTurmbank');
Route::get('/editTurm/{id}', [adminController::class, 'editTurm'])->name('list.editTurm');
Route::post('/updateTurm/{id}', [adminController::class, 'updateTurm'])->name('list.updateTurm');
Route::get('/deleteTurm/{id}', [adminController::class, 'deleteTurm'])->name('list.deleteTurm');

/*PROFESSOR*/
Route::get('/list/listProf', [adminController::class, 'listProf'])->name('list.prof');
Route::get('/list/addProf', [adminController::class, 'addProf'])->name('list.addProf');
Route::post('/list/addProfbank', [adminController::class, 'addProfbank'])->name('list.addProfbank');
Route::get('/editProf/{id}', [adminController::class, 'editProf'])->name('list.editProf');
Route::post('/updateProf/{id}', [adminController::class, 'updateProf'])->name('list.updateProf');
Route::get('/deleteProf/{id}', [adminController::class, 'deleteProf'])->name('list.deleteProf');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
