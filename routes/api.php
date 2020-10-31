<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
   CategoryAPIController,   
   ProductAPIController,
   TableAPIController,   
   TenantAPIController,
   Auth\RegisterController,
   Auth\AuthClientController
};

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/sanctum/token',[AuthClientController::class, 'auth']);

Route::group(['middleware'=>['auth:sanctum']], function(){
      Route::get('/auth/me',[AuthClientController::class, 'me']);
      Route::post('/auth/logout',[AuthClientController::class, 'logout']);
});


Route::group([
   'prefix'=>'v1',
   'namespace'=>'Api'
],function (){
   Route::get('/tenants/{uuid}',[TenantAPIController::class, 'show']); 
   Route::get('/tenants',[TenantAPIController::class, 'index']); 

   Route::get('/categories/{url}',[CategoryAPIController::class, 'show']);
   Route::get('/categories',[CategoryAPIController::class, 'categoriesByTenant']);

   Route::get('/tables/{identity}',[TableAPIController::class, 'show']);
   Route::get('/tables',[TableAPIController::class, 'tablesByTenant']);

   Route::get('/products',[ProductAPIController::class, 'ProductsByTenant']);
   Route::get('/products/{flag}',[ProductAPIController::class, 'show']);

   
   Route::post('/client',[RegisterController::class, 'store']);
});


