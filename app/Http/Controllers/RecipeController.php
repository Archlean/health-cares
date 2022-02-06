<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(){
        return view('recipe.index', ['routes' => 'Recipe']);
    }

    public function recipeMixer(){
        return view('recipe.recipe-input', ['routes' => 'New Recipe']);
    }
}
