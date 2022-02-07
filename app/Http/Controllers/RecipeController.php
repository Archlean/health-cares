<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\ObAlkes;
use App\Models\SignaMaster;

class RecipeController extends Controller
{
    public function index(){
        return view('recipe.index', ['routes' => 'Recipe']);
    }

    public function recipeMixer(){
        return view('recipe.recipe-input', ['routes' => 'New Recipe', 'overlay' => false, 'items' => '', 'corresponding' => '']);
    }

    public function recipeMixerData(Request $request, $obatalkes_id){
        $Items = ObAlkes::where('obatalkes_id', $obatalkes_id)->get();
        return view('recipe.recipe-input', ['routes' => 'New Recipe', 'overlay' => true, 'items' => $Items, 'corresponding' => $request]);
    }

    public function createRecipeConcoction(){
        return view('recipe.recipe-input', ['routes' => 'Concoction', 'overlay' => true, 'items' => '', 'corresponding' => '']);
    }
    
    public function createRecipeNconcoction(){
        return view('recipe.recipe-input', ['routes' => 'Non Concoction', 'overlay' => true, 'items' => '', 'corresponding' => '']);
    }
}
