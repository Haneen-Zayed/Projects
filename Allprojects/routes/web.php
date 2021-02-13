<?php
namespace App\Http\Controllers\web;
use Illuminate\Http\Request;
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
///////////////////////////////////////

Route::get('notes/userNotes', [FluentController::class, 'userNotes'])->name('notes.userNotes');
Route::get('notes/create', [FluentController::class, 'create'])->name('notes.create');
Route::get('notes/store', [FluentController::class, 'store'])->name('notes.store');
Route::get('notes/show/{id}', [FluentController::class, 'show'])->name('notes.show');
Route::get('notes/edit/{id}', [FluentController::class, 'edit'])->name('notes.edit');
Route::get('notes/update/{id}', [FluentController::class, 'update'])->name('notes.update');
Route::get('notes/delete/{id}', [FluentController::class, 'destroy'])->name('notes.delete');
