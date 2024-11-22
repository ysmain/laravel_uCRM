<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InertiaTestController;

Route::resource('items', ItemController::class)
->middleware(['auth', 'verified']);
// resourceだとnameのエンドポイントも自動的にできる。items.indexなど

Route::resource('customers', CustomerController::class)
->middleware(['auth','verified']);










// イナーシャ版のルートの書き方
Route::get('/inertia-test', function () {
    // イナーシャ版のview
    return Inertia::render('InertiaTest');
    }
);

// イナーシャ版のルートの書き方2
Route::get('/inertia/index',[InertiaTestController::class, 'index'])
    ->name('inertia.index');

Route::get('/inertia/create',[InertiaTestController::class, 'create'])
    ->name('inertia.create');

Route::post('/inertia',[InertiaTestController::class, 'store'])
    ->name('inertia.store');

// showの書き方
Route::get('/inertia/show/{id}',[InertiaTestController::class, 'show'])
    ->name('inertia.show');

Route::delete('/inertia/{id}',[InertiaTestController::class, 'delete'])
    ->name('inertia.delete');


Route::get('/component-test', function () {
    // イナーシャ版のview
    return Inertia::render('ComponentTest',);
    }
);




Route::get('/', function () {
    // Welcome.vueに変数を渡している
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
