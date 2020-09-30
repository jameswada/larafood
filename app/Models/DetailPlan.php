<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPlan extends Model
{
    protected $table = 'detail_plan'; 
    protected $fillable =['name'];

    public function plan(){
        $this->belongsTO(Plan::class);
    }
}
