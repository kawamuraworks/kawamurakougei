<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ContactController;

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
})->name('index');

// Route::resource('admin', DetailController::class);

// 【AWS用】シンボリックリンクが適用され、新たにフォルダを作成できる場合
// indexとpriorityは一緒のviewで表示
Route::get('work', [DetailController::class, 'index'])->name('work.index');
Route::get('work/{priority?}', [DetailController::class, 'priority'])->name('work.index');


Route::group(['middleware' => ['auth']], function () {
    Route::get('admin/list', [DetailController::class, 'list'])->name('admin.list');
    Route::get('admin/create', [DetailController::class, 'create'])->name('admin.create');
    Route::post('admin', [DetailController::class, 'store'])->name('admin.store');

    Route::get('admin/select', [DetailController::class, 'select'])->name('admin.select');

    Route::get('admin/{admin}', [DetailController::class, 'show'])->name('admin.show');
    Route::get('admin/{admin}/edit', [DetailController::class, 'edit'])->name('admin.edit');
    Route::patch('admin/{admin}', [DetailController::class, 'update'])->name('admin.update');
    Route::delete('admin/{admin}', [DetailController::class, 'destroy'])->name('admin.destroy');
});

Route::get('contact', [ContactController::class, 'index'])->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
