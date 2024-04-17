<?php

use App\Http\Controllers\LogoutController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Courses\Index as CoursesIndex;
use App\Livewire\Courses\Show;
use App\Livewire\Dashboard;
use App\Livewire\Graduation;
use App\Livewire\Index;
use App\Livewire\Profile;
use Illuminate\Support\Facades\Route;

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


Route::middleware('guest')->group(function(){
    Route::get('/', Index::class);
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');

});

Route::group(['middleware' => 'auth'], function(){
    Route::get('graduation', Graduation::class)->name('graduation');

Route::prefix('courses')->group(function(){
    Route::get('/', CoursesIndex::class)->name('course.index');
    Route::get('{uuid}', Show::class)->name('course.show');
});

Route::get('dashboard', Dashboard::class)->name('home');

Route::get('profile', Profile::class)->name('profile');

Route::post('logout', [LogoutController::class, 'store'])->name('logout');

});
