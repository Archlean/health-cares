<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $userRecipe = Recipe::where('username', auth()->user()->username)->get();
        return view('cart.index', ['routes' => 'My Recipe', 'recipe' => $userRecipe, 'detail' => [], 'message' => 'no message']);
    }

    public function showDetail($id){
        $userRecipe = Recipe::where(['username' => auth()->user()->username, 'id' => $id])->get();
        $arrData = json_decode($userRecipe[0]->recipe_detail, true);
        
        return view('cart.scheme-show', ['routes' => 'My Recipe', 'recipe' => $userRecipe, 'detail' => $arrData, 'message' => 'no message']);
    }

    public function PrintDetail($id){
        $userRecipe = Recipe::where(['username' => auth()->user()->username, 'id' => $id])->get();
        $Recipe = json_decode($userRecipe[0]->recipe_detail, true);
        
        $pdf = PDF::loadview('cart.scheme-show',['routes' => '', 'recipe' => $userRecipe, 'detail' => $Recipe, 'message' => 'no message']);
        return $pdf->download ('recipe_' . $userRecipe[0]->recipe_name . '.pdf');
    }

    public function DeleteScheme($id){
        $userRecipe = Recipe::where('id', $id)->get();
        $name = $userRecipe[0]->recipe_name;
        Recipe::where(['username' => auth()->user()->username, 'id' => $id])->delete();
        $userRecipe = Recipe::where('username', auth()->user()->username)->get();
    
        return view('cart.index', ['routes' => 'My Recipe', 'recipe' => $userRecipe, 'detail' => [], 'message' => $name . ' has succsessfull deleted from your recipe or scheme list']);
    }
}
