<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\App\{
    ProfileController,
    UserController,
    BookController,
    BorrowController
};





/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return view('app.welcome');
    });

    Route::get('/dashboard', function () {
        return view('app.dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


        Route::resource('app.books', BookController::class);
        Route::get('/books', [BookController::class, 'index'])->name('books.index');
        Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
        Route::post('/books', [BookController::class, 'store'])->name('books.store');
        Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
        Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

        Route::get('books/{book}/borrow', [BorrowController::class, 'borrow'])->name('books.borrow');
        Route::post('borrow/store', [BorrowController::class, 'store'])->name('borrow.store');
        Route::get('/library', [BorrowController::class, 'library'])->name('borrow.library');
        Route::get('/borrowing', [BorrowController::class, 'borrowing'])->name('borrow.borrowing');
        Route::delete('/borrow/{borrow}', [BorrowController::class, 'cancel'])->name('borrow.cancel');

        Route::get('/borrow/{borrow}/edit', [BorrowController::class, 'edit'])->name('borrow.edit');
        Route::put('/borrow/{borrow}', [BorrowController::class, 'update'])->name('borrow.update');
        Route::delete('/borrow/{borrow}', [BorrowController::class, 'destroy'])->name('borrow.destroy');

        Route::post('borrow/{borrow}/approve', [BorrowController::class, 'approve'])->name('borrow.approve');
        Route::post('borrow/{borrow}/complete', [BorrowController::class, 'complete'])->name('borrow.complete');




        Route::group(['middleware' => ['role:admin']], function () {
            Route::resource('users', UserController::class);
            Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        });
    });





    require __DIR__ . '/tenant-auth.php';
});
