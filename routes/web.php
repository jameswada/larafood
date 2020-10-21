<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\Admin\PlanController; 
use App\Http\Controllers\Admin\CategoryController; 
use App\Http\Controllers\Admin\DetailPlanController; 
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ACL\ProfileController; 
use App\Http\Controllers\Admin\ACL\PermissionController; 
use App\Http\Controllers\Admin\ACL\PermissionProfileController;
use App\Http\Controllers\Admin\ACL\PermissionRoleController;
use App\Http\Controllers\Admin\ACL\PlanProfileController;
use App\Http\Controllers\Admin\ACL\RoleController;
use App\Http\Controllers\Admin\ACL\RoleUserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Site\SiteController;


// use App\Models\User;

Route::prefix('admin')->middleware('auth')->group(function(){

//debug 
Route::get('teste', function(){ dd(auth()->user()->permissions()); });
//debug 
// Route::get('teste', function(){ dd(auth()->user()->hasPermission('Planos')); });


// roles x users
Route::get('users/{id}/role/{idRole}/detach', [RoleUserController::class, 'detachRolesUser'])->name('users.role.detach');
Route::post('users/{id}/roles', [RoleUserController::class, 'attachRolesUser'])->name('users.roles.attach');
Route::any('users/{id}/roles/create', [RoleUserController::class, 'rolesUserAvailable'])->name('users.roles.available');
Route::get('users/{id}/roles', [RoleUserController::class, 'roles'])->name('users.roles');
Route::get('role/{id}/users', [RoleUserController::class, 'users'])->name('roles.users');

// permissions x roles
Route::get('roles/{id}/permissions/{idPermission}/detach', [PermissionRoleController::class, 'detachPermissionsRole'])->name('roles.permissions.detach');
Route::post('roles/{id}/permissions', [PermissionRoleController::class, 'attachPermissionsRole'])->name('roles.permissions.attach');
Route::any('roles/{id}/permissions/create', [PermissionRoleController::class, 'permissionsAvailable'])->name('roles.permissions.available');
Route::get('roles/{id}/permissions', [PermissionRoleController::class, 'permissions'])->name('roles.permissions');
Route::get('permissions/{id}/role', [PermissionRoleController::class, 'roles'])->name('permissions.roles');

// roles
Route::any('roles/search',[RoleController::class, 'search'])->name('roles.search');
Route::resource('roles', RoleController::class);

// tenants
Route::any('tenants/search',[TenantController::class, 'search'])->name('tenants.search');
Route::resource('tenants', TenantController::class);

// tables
Route::any('tables/search',[TableController::class, 'search'])->name('tables.search');
Route::resource('tables', TableController::class);


// product x category
Route::get('products/{id}/category/{idCategory}/detach', [CategoryProductController::class, 'detachCategoryProduct'])->name('products.categories.detach');
Route::post('products/{id}/category', [CategoryProductController::class, 'attachCategoryProduct'])->name('products.categories.attach');
Route::any('products/{id}/categories/create', [CategoryProductController::class, 'categoriesAvailable'])->name('products.categories.available');
Route::get('products/{id}/categories', [CategoryProductController::class, 'categories'])->name('products.categories');
Route::get('category/{id}/products', [CategoryProductController::class, 'products'])->name('category.products');

// products
Route::any('products/search',[ProductController::class, 'search'])->name('products.search');
Route::resource('products', ProductController::class);

// categories
Route::any('categories/search',[CategoryController::class, 'search'])->name('categories.search');
Route::resource('categories', CategoryController::class);

// users
Route::any('users/search',[UserController::class, 'search'])->name('users.search');
Route::resource('users', UserController::class);


// plan x profile
Route::get('plans/{id}/profile/{idProfile}/detach', [PlanProfileController::class, 'detachProfilesPlan'])->name('plans.profile.detach');
Route::post('plans/{id}/profiles', [PlanProfileController::class, 'attachProfilesPlan'])->name('plans.profiles.attach');
Route::any('plans/{id}/profiles/create', [PlanProfileController::class, 'profilesAvailable'])->name('plans.profiles.available');
Route::get('plans/{id}/profiles', [PlanProfileController::class, 'profiles'])->name('plans.profiles');
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
