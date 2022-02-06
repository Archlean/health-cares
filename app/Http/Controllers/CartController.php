<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $userRecipe = Recipe::where('username', auth()->user()->username)->get();
        return view('cart.index', ['routes' => 'My Recipe', 'recipe' => $userRecipe]);
    }
}
