<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SocietyAdminsController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


// auth routes

Route::group(
    [
        'middleware' => 'guest',
    ],
    function () {
        Route::get('/login', function () {
            return view('front.authentication.login');
        })->name('login');
    }
);

// template routes start here

Route::group(
    ['prefix' => 'dashboard', 'as' => 'dashboard.'],
    function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::get('/calender', [DashboardController::class, 'CalendarRender'])->name('calender');
        Route::group(
            ['prefix' => 'societies-admins', 'as' => 'society-admin.'],
            function () {
                Route::get('/', [SocietyAdminsController::class, 'index'])->name('index');
                Route::get('/create', [SocietyAdminsController::class, 'RenderCreate'])->name('render-create');
            }
        );
    }
);
