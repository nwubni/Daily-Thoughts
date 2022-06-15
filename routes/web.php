<?php

use App\Http\Controllers\ReactionsController;
use App\Http\Controllers\ThoughtsController;
use App\Models\Thought;
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

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/feed', function () {
    return view('feed', [
        'thoughts' => Thought::latest('updated_at')
            ->withCount('reactions')
            ->paginate(4)
    ]);
})->middleware(['auth'])->name('feed');

Route::get('/thoughts', [ThoughtsController::class, 'list'])->name('get.thoughts')->middleware('auth');
Route::get('/thoughts/create', [ThoughtsController::class, 'create'])->middleware('auth');
Route::post('/thoughts', [ThoughtsController::class, 'store'])->name('create.thought')->middleware('auth');

Route::get('/thought/{thought}', [ThoughtsController::class, 'details'])->middleware('auth');
Route::patch('/thought/{thought}', [ThoughtsController::class, 'update'])->middleware('auth');
Route::delete('/thought/{thought}', [ThoughtsController::class, 'destroy'])->middleware('auth');

Route::get('/reactions/{thought}', [ReactionsController::class, 'list'])->name('get.reactions')->middleware('auth');
Route::post('/reactions/{thought}', [ReactionsController::class, 'store'])->name('react')->middleware('auth');
