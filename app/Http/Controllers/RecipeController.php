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
        return view('recipe.recipe-input', ['routes' => 'New Recipe', 'overlay' => '', 'items' => '', 'corresponding' => '']);
    }

    public function recipeMixerData(Request $request, $obatalkes_id){
        $Items = ObAlkes::where('obatalkes_id', $obatalkes_id)->get();
        return view('recipe.recipe-input', ['routes' => 'New Recipe', 'overlay' => '', 'items' => $Items, 'corresponding' => $request, 'signa' => SignaMaster::orderBy('signa_nama')->get()]);
    }

    public function createRecipeConcoction(){
        return view('recipe.recipe-input', ['routes' => 'Concoction', 'overlay' => 'createRecipeConcoction', 'items' => '', 'corresponding' => '', 'signa' => SignaMaster::orderBy('signa_nama')->get()]);
    }
    
    public function createRecipeNconcoction(){
        return view('recipe.recipe-input', ['routes' => 'Non Concoction', 'overlay' => '', 'items' => '', 'corresponding' => '', 'signa' => SignaMaster::orderBy('signa_nama')->get()]);
    }

    public function saveRecipeOnly(Request $request){
        $Items = ObAlkes::where('obatalkes_kode', $request['medcode'])->get();
        $retrieveData = $request->validate([
            'recipename' => 'required',
            'signa' => 'required'
        ]);
        
        $fewsData = [
            'username' => auth()->user()->username,
            'category' => 'Concoction',
            'recipe_name' => $retrieveData['recipename'],
            'recipe_detail' => json_encode([]),
            'quantity' => '1',
            'signa_recipe' => $retrieveData['signa'],
        ];
        
        Recipe::create($fewsData);
        return redirect('/recipe')->with('recipe-post-success','Successfull to add new recipes with sheet name ' . $retrieveData['recipename']);
    }
}
