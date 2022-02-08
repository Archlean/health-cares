<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $userRecipe = Recipe::where('username', auth()->user()->username)->get();
        return view('cart.index', ['routes' => 'My Recipe', 'recipe' => $userRecipe, 'detail' => '']);
    }

    public function showDetail($id){
        $userRecipe = Recipe::where(['username' => auth()->user()->username, 'id' => $id])->get();
        $arrData = json_decode($userRecipe[0]->recipe_detail, true);
        
        return view('cart.scheme-show', ['routes' => 'My Recipe', 'recipe' => $userRecipe, 'detail' => $arrData]);
    }

    public function PrintDetail($id){
        
    }

    public function DeleteScheme($id){
        
    }
}
