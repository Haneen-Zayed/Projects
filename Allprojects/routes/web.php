<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Auth;
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

Route::get('notes/userNotes', [web\NoteController::class, 'userNotes'])->name('notes.userNotes');
Route::get('notes/create', [web\NoteController::class, 'create'])->name('notes.create');
Route::post('notes/store', [web\NoteController::class, 'store'])->name('notes.store');
Route::get('notes/show/{id}', [web\NoteController::class, 'show'])->name('notes.show');
Route::get('notes/edit/{id}', [web\NoteController::class, 'edit'])->name('notes.edit');
Route::post('notes/update/{id}', [web\NoteController::class, 'update'])->name('notes.update');
Route::get('notes/delete/{id}', [web\NoteController::class, 'destroy'])->name('notes.delete');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
