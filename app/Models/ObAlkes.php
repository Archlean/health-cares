<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObAlkes extends Model
{
    //use HasFactory;
    protected $table = 'obatalkes_m';
    
    public function getRouteKeyName(){
        return 'obatalkes_id';
    }
}
