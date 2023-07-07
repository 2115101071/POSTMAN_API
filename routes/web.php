<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PostController;
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

Route::get('/', [MahasiswaController::class, 'index'])->name('home');

Route::get('/create', [MahasiswaController::class, 'create'])->name('tambahdata');  
Route::post('/insertdata', [MahasiswaController::class, 'insertdata'])->name('insertdata');  

Route::get('/edit/{id}', [MahasiswaController::class, 'tampilkandata'])->name('edit');  
Route::post('/updatedata/{id}', [MahasiswaController::class, 'updatedata'])->name('updatedata');  

Route::get('/delete/{id}', [MahasiswaController::class, 'delete'])->name('delete');  


// export PDF
Route::get('/exportpdf', [MahasiswaController::class, 'exportpdf'])->name('exportpdf');  

// export excel
Route::get('/exportexcel', [MahasiswaController::class, 'exportexcel'])->name('exportexcel');  

// import excel
Route::get('/insertfile', [MahasiswaController::class, 'insertfile'])->name('insertfile'); 
Route::post('/importexcel', [MahasiswaController::class, 'importexcel'])->name('importexcel'); 



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
