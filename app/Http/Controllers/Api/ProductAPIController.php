<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProductAPIController extends Controller
{
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService; 
    }

    public function productsByTenant(TenantFormRequest $request)
    {
        // return response()->json(array($request->get('categories',[]))); 
        $products=$this->productService
            ->getProductsByTenantUuid(
                    $request->token_company,
                    $request->json()->get('categories',[])
            );
        return ProductResource::collection($products); 
    }

    public function show(TenantFormRequest $request, $flag)
    {
        if(!$product = $this->productService-> getProductByFlag( $flag)){
            return response()->json(['message'=>'Product Not Found'], 404);
        }
        return new ProductResource($product); 
    }


}
