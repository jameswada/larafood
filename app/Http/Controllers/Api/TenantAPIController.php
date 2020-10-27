<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TenantResource;
use App\Services\TenantService;
use Illuminate\Http\Request;

class TenantAPIController extends Controller
{
    protected $tenantService; 
    public function __construct(TenantService $tenantService){
        $this->tenantService=$tenantService; 
    }
    public function show($uuid){
        if ($tenant=$this->tenantService->getTenantByUuid($uuid)){
            return response()->json(['message'=>'Not Found'], 404);
        }
        
        return new TenantResource($tenant); 
    }
    public function index(Request $request){
        // return $this->tenantService->getAllTenants(); 
        $linhasPorPagina = (int) $request->get('per_page',15);
        $tenants = $this->tenantService->getAllTenants($linhasPorPagina); 
        return TenantResource::collection($tenants);
    }
}
