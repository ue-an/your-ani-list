<?php

use App\Http\Controllers\AniListController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

//==CLOSURE FUNCTION==
// Route::get('/greetings', function() {
//     return "Hellp weeb";
// });
// //Dependency injection
// Route::get('/watchers', function(Request $request){
//     return $request->id;
// });
// //Redirect
// Route::redirect('/', '/greetings',);
// //Pass data
// // Route::view('/welcome', 'welcome',['name' => 'Ian']);

// //Named Route
// Route::view('/welcome', 'welcome',['name' => 'Ian'])->name('welcome');

// //Route Model Binding
// Route::get('/watchers/{user}', function(User $user){
//     return $user->email;
// });


// //Optional Parameters
// //error if no 'null'
// Route::get('watcher/{name?}', function ($name = null) {
//     return $name;
// });

// //Route fallback
// Route::fallback(function(){
//     //
// });

//==ROUTE CONTROLLER as 2nd parameter==
//Start
Route::get('/users', [UserController::class, 'index'])->middleware('checkUser');

//newly added methods in resource must be placed first (routing order)
// Route::get('/watchers/names', [WatcherController::class, 'names']);

//Route anime superadmin
Route::resource('/animes', AnimeController::class);

//Route animelist
Route::get('/animelists-watching', [AniListController::class, 'watching']);
Route::get('/animelists-completed', [AniListController::class, 'completed']);
Route::get('/animelists-plan-to-watch', [AniListController::class, 'planwatch']);
Route::get('/animelists-all', [AniListController::class, 'all']);
Route::get('/animelists-remove', [AniListController::class, 'remove']);
Route::resource('/animelists', AniListController::class);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::redirect('/home', '/animes');
