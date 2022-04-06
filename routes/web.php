<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailController;

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
    return view('index');
});

// Route::resource('admin', DetailController::class);
Route::get('work', [DetailController::class, 'index'])->name('work.index');
Route::get('work/{priority?}', [DetailController::class, 'priority'])->name('work.index');

Route::get('admin/create', [DetailController::class, 'create'])->name('admin.create');
Route::post('admin', [DetailController::class, 'store'])->name('admin.store');

Route::get('admin/select', [DetailController::class, 'select'])->name('admin.select');

Route::get('admin/{admin}', [DetailController::class, 'show'])->name('admin.show');
Route::get('admin/{admin}/edit', [DetailController::class, 'edit'])->name('admin.edit');
Route::patch('admin/{admin}', [DetailController::class, 'update'])->name('admin.update');
Route::delete('admin/{admin}', [DetailController::class, 'destroy'])->name('admin.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
