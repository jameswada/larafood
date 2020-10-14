<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Category;

class CategoryObserver
{
    public function creating(Category $category)
    {
        $category->url = Str::kebab($category->name);     
    }


    public function updating(Category $category)
    {
        $category->url = Str::kebab($category->name);     
    }


}
