<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $table = 'recipes';
    
    protected $fillable = [
        'username',
        'category',
        'recipe_name',
        'recipe_detail',
        'signa_recipe',
        'quantity'
    ];

    protected $guarded = [
        'id'
    ];

    public function getRouteKeyName(){
        return 'username';
    }
}
