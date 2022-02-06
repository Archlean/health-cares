<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedsController extends Controller
{
    public function index(){
        return view('feeds', ['routes' => 'Feeds']); 
    }
}
