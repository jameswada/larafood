<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlanController; 
use App\Http\Controllers\Admin\CategoryController; 
use App\Http\Controllers\Admin\DetailPlanController; 
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ACL\ProfileController; 
use App\Http\Controllers\Admin\ACL\PermissionController; 
use App\Http\Controllers\Admin\ACL\PermissionProfileController; 
use App\Http\Controllers\Admin\ACL\PlanProfileController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Auth;

Route::prefix('admin')->middleware('auth')->group(function(){

// categories
Route::any('categories/search',[CategoryController::class, 'search'])->name('categories.search');
Route::resource('categories', CategoryController::class);

// users
Route::any('users/search',[UserController::class, 'search'])->name('users.search');
Route::resource('users', UserController::class);


// plan x profile
Route::get('plan/{id}/profile/{idProfile}/detach', [PlanProfileController::class, 'detachProfilesPlan'])->name('plans.profile.detach');
Route::post('plan/{id}/profiles', [PlanProfileController::class, 'attachProfilesPlan'])->name('plans.profiles.attach');
Route::any('plan/{id}/profiles/create', [PlanProfileController::class, 'profilesAvailable'])->name('plans.profiles.available');
Route::get('plan/{id}/profiles', [PlanProfileController::class, 'profiles'])->name('plans.profiles');
Route::get('profile/{id}/plans', [PlanProfileController::class, 'plans'])->name('profiles.plans');


// permissions x profile
Route::get('profiles/{id}/permissions/{idPermission}/detach', [PermissionProfileController::class, 'detachPermissionsProfile'])->name('profiles.permissions.detach');
Route::post('profiles/{id}/permissions', [PermissionProfileController::class, 'attachPermissionsProfile'])->name('profiles.permissions.attach');
Route::any('profiles/{id}/permissions/create', [PermissionProfileController::class, 'permissionsAvailable'])->name('profiles.permissions.available');
Route::get('profiles/{id}/permissions', [PermissionProfileController::class, 'permissions'])->name('profiles.permissions');
Route::get('permissions/{id}/profile', [PermissionProfileController::class, 'profiles'])->name('permissions.profiles');

// permissions
Route::any('permissions/search',[PermissionController::class, 'search'])->name('permissions.search');
Route::resource('permissions', PermissionController::class);
// profiles
Route::any('profiles/search',[ProfileController::class, 'search'])->name('profiles.search');
Route::resource('profiles', ProfileController::class);
// detailPlan
Route::get('plans/{url}/details/create', [DetailPlanController::class, 'create'])->name('details.plans.create');
Route::delete('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'destroy'])->name('details.plans.destroy');
Route::get('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'show'])->name('details.plans.show');
Route::put('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'update'])->name('details.plans.update');
Route::get('plans/{url}/details/{idDetail}/edit', [DetailPlanController::class, 'edit'])->name('details.plans.edit');
Route::post('plans/{url}/details', [DetailPlanController::class, 'store'])->name('details.plans.store');
Route::get('plans/{url}/details', [DetailPlanController::class, 'index'])->name('details.plans.index');

// plan
    Route::get('plans/create', [PlanController::class,'create'])->name('plans.create');
    Route::put('plans/{url}/', [PlanController::class,'update'])->name('plans.update');
    Route::get('plans/{url}/edit', [PlanController::class,'edit'])->name('plans.edit');
    Route::any('plans/search',[PlanController::class,'search'])->name('plans.search');
    Route::post('plans', [PlanController::class,'store'])->name('plans.store');
    Route::delete('plans/{url}', [PlanController::class,'destroy'])->name('plans.destroy');
    Route::get('plans/{url}', [PlanController::class,'show'])->name('plans.show');
    Route::get('plans', [PlanController::class,'index'])->name('plans.index');
    Route::get('/', [PlanController::class,'index'])->name('admin.index');
});


// auth routes -- necessita laravel/ui package 
// Auth::routes(['register'=>false]);
// Route::get('/', function () {    return view('welcome');});

//site
Route::get('/plan/{url}', [SiteController::class,'plan'])->name('plan.subscription');
Route::get('/', [SiteController::class,'index'])->name('site.home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
