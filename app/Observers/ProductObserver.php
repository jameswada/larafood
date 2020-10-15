<?php

namespace App\Observers;

use App\Models\Product;

use App\Models\Tenant;

use Illuminate\Support\Str;

class ProductObserver
{
    public function creating(Product $product)
    {
        $product->flag = Str::kebab($product->title);     
    }


    public function updating(Product $product)
    {
        $product->flag = Str::kebab($product->title);     
    }
}
