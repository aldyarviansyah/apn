<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PierCategoryController;
use App\Http\Controllers\PierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BoatController;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\AccessRequestController;
use App\Http\Controllers\CompanyController;
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

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('lang/{locale}', [HomeController::class, 'languageChange'])->name('languages.change');

Route::get('request-access', [AccessRequestController::class, 'create'])->name('access-requests.public');
Route::post('request-access/store', [AccessRequestController::class, 'store'])->name('access-requests.store');

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('reset-password', [ProfileController::class, 'reset'])->name('profile.reset-password');
    Route::post('reset-password/store', [ProfileController::class, 'resetPassword'])->name('profile.reset.password');

    Route::get('access-requests', [AccessRequestController::class, 'index'])->middleware(['permission:access-requests-read-all'])->name('access-requests');
    Route::get('access-requests/{accessRequest}/show-approve', [AccessRequestController::class, 'showApprove'])->middleware(['permission:access-requests-approve'])->name('access-requests.showApprove');
    Route::post('access-requests/{accessRequest}/approve', [AccessRequestController::class, 'approve'])->middleware(['permission:access-requests-approve'])->name('access-requests.approve');

    Route::get('users', [UserController::class, 'index'])->middleware(['permission:users-read-all'])->name('users');
    Route::get('users/create', [UserController::class, 'create'])->middleware(['permission:users-create'])->name('users.create');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->middleware(['permission:users-update'])->name('users.edit');
    Route::get('users/{user}/reset', [UserController::class, 'reset'])->middleware(['permission:users-update'])->name('users.reset');
    Route::post('users/store', [UserController::class, 'store'])->middleware(['permission:users-create'])->name('users.store');
    Route::post('users/{user}/update', [UserController::class, 'update'])->middleware(['permission:users-update'])->name('users.update');
    Route::post('users/{user}/update-permission', [UserController::class, 'updatePermission'])->middleware(['permission:users-change-permissions'])->name('users.update.permission');
    Route::post('users/{user}/reset-password', [UserController::class, 'resetPassword'])->middleware(['permission:users-update'])->name('users.reset.password');

    Route::get('roles', [RoleController::class, 'index'])->middleware(['permission:roles-read-all'])->name('roles');
    Route::get('roles/create', [RoleController::class, 'create'])->middleware(['permission:roles-create'])->name('roles.create');
    Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->middleware(['permission:roles-update'])->name('roles.edit');
    Route::post('roles/store', [RoleController::class, 'store'])->middleware(['permission:roles-create'])->name('roles.store');
    Route::post('roles/{role}/update', [RoleController::class, 'update'])->middleware(['permission:roles-update'])->name('roles.update');

    Route::get('pier-categories', [PierCategoryController::class, 'index'])->middleware(['permission:pier-categories-read-all'])->name('pier-categories');
    Route::get('pier-categories/create', [PierCategoryController::class, 'create'])->middleware(['permission:pier-categories-create'])->name('pier-categories.create');
    Route::get('pier-categories/{pierCategory}/edit', [PierCategoryController::class, 'edit'])->middleware(['permission:pier-categories-update'])->name('pier-categories.edit');
    Route::post('pier-categories/store', [PierCategoryController::class, 'store'])->middleware(['permission:pier-categories-create'])->name('pier-categories.store');
    Route::post('pier-categories/{pierCategory}/update', [PierCategoryController::class, 'update'])->middleware(['permission:pier-categories-update'])->name('pier-categories.update');

    Route::get('piers', [PierController::class, 'index'])->middleware(['permission:pier-read-all'])->name('piers');
    Route::get('piers/create', [PierController::class, 'create'])->middleware(['permission:pier-create'])->name('piers.create');
    Route::get('piers/{pier}/edit', [PierController::class, 'edit'])->middleware(['permission:pier-update'])->name('piers.edit');
    Route::post('piers/store', [PierController::class, 'store'])->middleware(['permission:pier-create'])->name('piers.store');
    Route::post('piers/{pier}/update', [PierController::class, 'update'])->middleware(['permission:pier-update'])->name('piers.update');

    Route::get('ships', [ShipController::class, 'index'])->middleware(['permission:ships-read-all'])->name('ships');
    Route::get('ships/create', [ShipController::class, 'create'])->middleware(['permission:ships-create'])->name('ships.create');
    Route::get('ships/{ship}/edit', [ShipController::class, 'edit'])->middleware(['permission:ships-update'])->name('ships.edit');
    Route::post('ships/store', [ShipController::class, 'store'])->middleware(['permission:ships-create'])->name('ships.store');
    Route::post('ships/{ship}/update', [ShipController::class, 'update'])->middleware(['permission:ships-update'])->name('ships.update');

    Route::get('boats', [BoatController::class, 'index'])->middleware(['permission:boats-read-all'])->name('boats');
    Route::get('boats/create', [BoatController::class, 'create'])->middleware(['permission:boats-create'])->name('boats.create');
    Route::get('boats/{boat}/edit', [BoatController::class, 'edit'])->middleware(['permission:boats-update'])->name('boats.edit');
    Route::post('boats/store', [BoatController::class, 'store'])->middleware(['permission:boats-create'])->name('boats.store');
    Route::post('boats/{boat}/update', [BoatController::class, 'update'])->middleware(['permission:boats-update'])->name('boats.update');

    Route::get('companies', [CompanyController::class, 'index'])->middleware(['permission:companies-read-all'])->name('companies');
    Route::get('companies/create', [CompanyController::class, 'create'])->middleware(['permission:companies-create'])->name('companies.create');
    Route::get('companies/{company}/edit', [CompanyController::class, 'edit'])->middleware(['permission:companies-update'])->name('companies.edit');
});
