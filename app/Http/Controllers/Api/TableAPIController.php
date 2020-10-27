<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\TableResource;
use App\Services\TableService;
use Illuminate\Http\Request;

class TableAPIController extends Controller
{
    protected $tableService;

    public function __construct(TableService $tableService)
    {
        $this->tableService=$tableService; 
    }

    public function tablesByTenant(TenantFormRequest $request){
        // if($request->token_company){
        //     return response()->json(['message'=>'token not Found'], 404);
        // }
        $tables = $this->tableService->getTablesByUuid($request->token_company); 
        return TableResource::collection($tables); 
    }

    public function show(TenantFormRequest $request,$identity){
       if(!$table = $this->tableService->getTableByIdentity($identity)){
           return response()->json(['message'=>'Table Not Found'], 404);
       }
       return new TableResource($table);
    }
}
