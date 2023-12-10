<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobsPostController;
use App\Http\Controllers\ApplayController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::put('/pembaruan/{id}', [App\Http\Controllers\HomeController::class, 'pembaruan'])->name('pembaruan');

Route::get('/job-history', [ApplayController::class, 'jobhistori'])->name('job_history');
Route::get('/my-job', [App\Http\Controllers\HomeController::class, 'myjob'])->name('myjob');

Route::middleware(['checkAdmin'])->group(function () {
    Route::match(['get', 'post'], '/user', [App\Http\Controllers\HomeController::class, 'user'])->name('user');
});

Route::match(['get', 'post'], '/jobs_post', [JobsPostController::class, 'handleRequest'])->name('jobs_post');

Route::middleware(['checkApplicant'])->group(function () {
    Route::match(['get', 'post'], '/apply/{job_id}', [ApplayController::class, 'handleRequest'])->name('applay');

});
Route::get('/jobs/{id}', [JobsPostController::class, 'show'])->name('showjob'); // Detail Job
Route::get('/jobs/{id}/edit', [JobsPostController::class, 'edit'])->name('editjob'); // Edit Job Form
Route::put('/jobs/{id}', [JobsPostController::class, 'update'])->name('updatejob'); // Update Job

Route::delete('/jobs/{id}', [JobsPostController::class, 'destroy'])->name('jobs.destroy'); // Delete Job

