<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Page de connexion
Route::view('/login', 'auth.login')->name('login');

// Authentification
Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

// Page principale après connexion
Route::get('/home', function () {
    return view('home');
})->name('home');

//Dashboard 
//Route::get('/dashboard', function () {
 //  return view('dashboard');
///})->name('dashboard')->middleware('auth');

// Users
Route::get('/users', function () {
    return view('users');
})->name('users')->middleware('auth');

// Teachers
Route::get('/teachers', function () {
    return view('teachers');
})->name('teachers')->middleware('auth');

// Routes pour Settings (Profil)
////Route::middleware(['auth'])->group(function () {
   // Route::get('/settings', [SettingsController::class, 'edit'])->name('settings');
   /// Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');
//});

Route::middleware(['auth'])->group(function () {
    Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::put('/settings/update', [SettingsController::class, 'update'])->name('settings.update');
});

// Route pour ajouter un utilisateur
Route::get('/add-user', [UserController::class, 'create'])->name('addUser');
Route::post('/storeuser', [UserController::class, 'storeUser'])->name('add_User');


Route::get('/index', [UserController::class, 'index'])->name('index');

//Route::post('/editUser', [UserController::class, 'edit'])->name('editUser');
//Route::get(uri: '/showusers', [UserController::class, 'users'])->name('tasnim');


Route::post('/showusers', [UserController::class, 'users'])->name('showusers');
Route::get('/showusers', [UserController::class, 'users'])->name('showusers');

//modifier user
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('edit_user');
Route::put('/users/update/{id}', [UserController::class, 'update'])->name('update_user');




Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers');



// dash
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard1', function () {
        return view('dashboards.dashboard1');
    })->name('dashboard1');
    
    Route::get('/dashboard2', function () {
        return view('dashboards.dashboard2');
    })->name('dashboard2');
    
    Route::get('/dashboard3', function () {
        return view('dashboards.dashboard3');
    })->name('dashboard3');
    
    Route::get('/dashboard4', function () {
        return view('dashboards.dashboard4');
    })->name('dashboard4');
});



// Route pour le profil
Route::get('/profile', [ProfileController::class, 'edit'])
->name('profile.edit');

Route::put('/profile', [ProfileController::class, 'update'])
->name('profile.update');

// Route pour la déconnexion
Route::post('/logout', [LoginController::class, 'logout'])
->name('logout');